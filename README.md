# Cybersecurity-Internship
# Internship Task 1: Foundation & Environment Setup
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
