# Cybersecurity-Internship
**Organization:** ApexPlanet  


## 1. Cybersecurity Basics
### The CIA Triad
* **Confidentiality:** Protecting data from unauthorized access.
* **Integrity:** Ensuring data remains accurate and unaltered.
* **Availability:** Ensuring systems and data are accessible when required.

### Threat Types & Attack Vectors
* **Phishing:** Deceptive communications to steal sensitive data.
* **Malware:** Malicious software (Viruses, Ransomware, Trojans).
* **DDoS:** Flooding a network to exhaust resources and cause downtime.
* **SQL Injection:** Inserting malicious SQL code into entry fields for execution.
* **Brute Force:** Systematic attempt to guess passwords/keys.
* **Social Engineering:** Manipulating individuals into divulging confidential info.
* **Insider Threats:** Security risks originating from within the organization.

---

## 2. Lab Environment Setup
I have successfully built a professional "Sandbox" environment using the following:
* **Hypervisor:** Oracle VirtualBox.
* **Attacker Machine:** Kali Linux (The industry-standard OS for penetration testing).
* **Target Machine:** Metasploitable2 (An intentionally vulnerable Linux service).
* **Network Configuration:** Private **Host-Only Adapter** to ensure total isolation from external networks.

---

## 3. Networking Basics
### OSI Model & TCP/IP
The lab was verified using protocols across the OSI layers:
* **Layer 3 (Network):** IP Addressing and ICMP (Ping) verification.
* **Layer 7 (Application):** DNS, HTTP, and HTTPS analysis.
* **Subnetting & NAT:** Configuration of internal private IP ranges for lab isolation.

---

## 4. Cryptography Basics
* **Symmetric vs. Asymmetric:** Symmetric uses one key for both encryption/decryption; Asymmetric uses a Public/Private key pair.
* **Hashing:** One-way functions (MD5, SHA256) used for data integrity verification.
* **SSL/TLS:** Protocols for securing communication over a computer network via digital certificates.
* **Hands-on Practice:** Used **OpenSSL** to encrypt and decrypt files via the AES-256-CBC algorithm.

---

## 5. Tool Familiarization Verified
I have successfully tested and documented the following tools within the lab:
* **Wireshark:** Packet capture and protocol analysis.
* **Nmap:** Active network scanning and service version detection.
* **Burp Suite:** Web proxy for intercepting and manipulating HTTP/HTTPS traffic.
* **Netcat:** Raw network debugging and establishing TCP/UDP connections.

## Task 2: Network Security & Vulnerability Scanning
*Completed: April 24, 2026*

### 1. Information Gathering (Reconnaissance)
I mapped the target's digital footprint using a combination of techniques:
* **Passive Recon:** Utilized **Whois**, **Nslookup**, **Google Dorking**, and **Shodan** to gather intelligence without direct interaction.
* **Active Recon:** Performed **Ping Sweeps** and **Banner Grabbing** to verify the host status and service versions.

### 2. Network Scanning (Nmap)
Conducted comprehensive scanning to identify the attack surface:
* **Techniques:** TCP Stealth Scan (`-sS`), UDP Scan (`-sU`), Service Versioning (`-sV`), and OS Fingerprinting (`-O`).
* **Critical Findings:** Identified 20+ open ports including high-risk backdoors on Port 21 (FTP), Port 1524 (Ingreslock), and Port 6667 (IRC).

### 3. Vulnerability Assessment (OpenVAS)
Using **GVM (Greenbone Vulnerability Manager)**, I analyzed the target against the National Vulnerability Database.
* **Result:** Confirmed **Critical (10.0)** risks including the vsftpd 2.3.4 backdoor and UnrealIRCd Trojan.
* **Analysis:** Documented severity levels (Critical, High, Medium, Low) and mapped remediation steps for each finding.

### 4. Packet Analysis (Wireshark)
Monitored live traffic to visualize network-level threats:
* **Traffic Sniffing:** Captured unencrypted **FTP credentials** (username/password) in plain text.
* **Attack Simulation:** Analyzed a **SYN Flood attack** simulated with `hping3`, observing the exhaustion of system resources through half-open connections.

### 5. Defensive Measures (Firewall/Iptables)
Implemented host-based security controls to mitigate the discovered risks:
* **Rules:** Developed **Iptables** rules to block the FTP backdoor, reject Telnet access, and implement rate-limiting to prevent automated port scans.
* **Verification:** Demonstrated the successful blocking of unauthorized connection attempts.

---
### Task 3: Web Application Security
**Completed:** May 5, 2026[cite: 1]

#### **1. Lab Environment Expansion**
* **Platform:** Kali Linux (VM)[cite: 1].
* **Target Application:** Deployed **DVWA (Damn Vulnerable Web Application)** on a local Apache2 server with MariaDB[cite: 1].
* **Configuration:** Modified PHP settings (`allow_url_include = On`) to enable the study of File Inclusion (LFI/RFI) vulnerabilities in a controlled setting[cite: 1].

#### **2. OWASP Top 10 Exploitation & Analysis**
I identified and successfully exploited critical web vulnerabilities using **Burp Suite** and manual injection techniques[cite: 1]:

* **SQL Injection (SQLi):**
    * **Exploit:** Executed a `UNION-based` attack (`1' UNION SELECT user, password FROM users-- -`) to extract sensitive usernames and MD5-hashed passwords directly from the database[cite: 1, 2].
    * **Impact:** Confirmed that unsanitized input leads to complete database compromise and credential theft[cite: 2].
* **Cross-Site Scripting (XSS):**
    * **Stored XSS:** Injected a malicious `<script>` into the guestbook field, proving persistence as the alert box triggered on every page refresh[cite: 1, 2].
    * **Reflected XSS:** Crafted malicious URLs to execute scripts in the victim's browser context, simulating session hijacking scenarios[cite: 1, 2].
* **Cross-Site Request Forgery (CSRF):**
    * **Exploit:** Developed a hidden HTML attack file (`csrf_attack.html`) that silently changed an authenticated user's password to `hacked123` without their consent[cite: 1, 2].

#### **3. Burp Suite Advanced Testing**
* **Proxy & Intercept:** Intercepted live HTTP POST requests to modify login credentials in transit[cite: 1].
* **Intruder Module:** Conducted a brute-force attack using the `rockyou.txt` wordlist, identifying valid credentials by analyzing variations in HTTP response lengths[cite: 1].

#### **4. Mitigation & Defensive Hardening**
I implemented and verified the following industry-standard defenses[cite: 1]:

* **Secure Coding:** Documented the migration from vulnerable string concatenation to **Prepared Statements (Parameterized Queries)** to prevent SQLi[cite: 1, 2].
* **Output Encoding:** Utilized PHP’s `htmlspecialchars()` to neutralize XSS payloads by converting special characters into HTML entities[cite: 1, 2].
* **Anti-CSRF Tokens:** Verified the implementation of unique, unpredictable session tokens to validate all state-changing requests[cite: 1, 2].
* **Web Security Headers:** Hardened the Apache server configuration by deploying the following protective headers[cite: 1]:
    * `Content-Security-Policy` (XSS Mitigation)
    * `X-Frame-Options: SAMEORIGIN` (Clickjacking Protection)
    * `X-Content-Type-Options: nosniff` (MIME Sniffing Protection)

#### **5. Verified Results**
* **Security Scanning:** Used `securityheaders.com` and `curl` to verify the header implementation, successfully moving the server from a failing grade to a "Secure" status[cite: 1].
* **Lab Validation:** Demonstrated that all previously successful attack payloads (SQLi, XSS, CSRF) were effectively blocked once the DVWA Security Level was increased to **Medium/High**[cite: 1, 2].
  
Task 4: Exploitation & System Security
Completed: May 18, 2026

Remote Exploitation (Metasploit): Launched msfconsole and utilized the exploit/unix/ftp/vsftpd_234_backdoor module against the target IP (192.168.56.101). Triggered the application backdoor to drop into an unauthorized root command shell, then used a Python pty inline script to upgrade it to an interactive TTY terminal and exfiltrated the password hashes via cat /etc/shadow.

Password Attacks (Hydra & John the Ripper): Executed a high-velocity automated dictionary attack against the target's open SSH Port 22 using THC-Hydra with legacy overrides (ssh-rsa) and the rockyou.txt wordlist to isolate valid root credentials. Saved the exfiltrated hashes to target_hash.txt and ran John the Ripper to successfully decode the encryption back into plain text.

Social Engineering Mockup: Engineered a responsive frontend authentication gateway login template using structural HTML and CSS rules. This user interface simulates a credential-harvesting phishing page used in professional red-team exercises to train corporate personnel on inspecting top-level domains and TLS certificates.

Static Malware Analysis: Conducted a safe, non-runtime integrity audit on a suspicious target binary (sample_file.exe). Ran the file command to check the underlying compiler architecture, used the strings utility to extract hidden plaintext indicators of compromise (C2 server URLs), and calculated an unalterable signature using sha256sum.

System Hardening & Defenses: Switched roles to a system administrator to execute layered endpoint security. Patched software dependencies using sudo apt update && sudo apt upgrade -y, deployed the Uncomplicated Firewall (ufw) to enforce a strict default-deny incoming policy whitelisting only ports 80 and 443, and permanently terminated and disabled the vulnerable vsftpd daemon from the system boot tables.

Task 5:
### Layer 1: Static Trusted-Domain Allowlist Verification

Routes incoming URL string requests through an initial fast-path verification array containing over 150 pre-approved trusted domains—explicitly whitelisting all six Yenepoya University institutional portals . Matches bypass downstream processing and are instantly assigned a clean 2% risk score to guarantee zero false positives for local campus infrastructure .

 ### Layer 2: Rule-Based Structural Blocklist Evaluation

Scans raw URL properties against a strict pattern-matching engine designed to instantly trap clear architectural anomalies . Any connection string featuring direct IP-address hosting, embedded user-manipulation symbols like `@`, Punycode scripts, or homograph domain structures is immediately intercepted and flagged with a static 97% high-risk threat rating .

 ### Layer 3: Machine Learning Random Forest Classification

Passes all remaining unclassified URL strings into a custom feature extraction module to process 21 numerical lexical, structural, and semantic features . These vectors are normalized via a serialized standard scaler and classified using a trained Random Forest model (200 trees, maximum depth of 20) to compute a dynamic threat probability score from 0% to 100% .

 ### Asynchronous Manifest V3 Browser Interception Pipeline

Deploys a lightweight Chrome browser extension utilizing a non-blocking `background.js` service worker that hooks into `chrome.webNavigation.onCompleted` listeners . The extension asynchronously dispatches captured URLs via structured JSON API payloads to a cloud-hosted Flask backend, changing the extension icon badge color or rendering an intrusive full-page block overlay if risks exceed 80% .

 ### Centralized Security Intelligence Dashboard and Local Persistence

Persists all structural threat logs, extracted feature vectors, and dynamic WHOIS registries into a local SQLite database engine (`detections.db`) . This analytics data is fed into a single-page interactive monitoring dashboard optimized with Chart.js modules to present security feeds, processing metrics, and mathematical feature importance charts directly to the end user .
