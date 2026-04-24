# 🛡️Task 2: Network Security, Scanning & Vulnerability Management
**Internship:** Cybersecurity Intern @ ApexPlanet  
**Name:** Nikitha 
**Target System:** Metasploitable2 (`192.168.56.101`)  
**Attacker Machine:** Kali Linux  

---

## 1. Information Gathering (Reconnaissance)
I initiated the project by mapping the target's digital footprint using both passive and active techniques.

###  Passive Reconnaissance
*Executed without sending packets directly to the target system.*
* **Whois:** Identified domain registration details and IP address blocks.
* **Nslookup:** Performed DNS queries to resolve hostnames and identify mail servers.
* **Google Dorking:** Used advanced search operators like `intitle:"index of"` to find exposed sensitive directories.
* **Shodan:** Scanned the IP for historical data, public service banners, and known hardware vulnerabilities.

###  Active Reconnaissance
*Directly probing the target to verify its status.*
* **Ping Sweep:** Conducted via `nmap -sn 192.168.56.0/24` to confirm the host was alive on the subnet.
* **Banner Grabbing:** Used `netcat` to capture service banners and identify specific software versions.

---

## 2. Network Scanning (Nmap)
A deep-dive scan was performed to identify open ports, active services, and the underlying operating system.

### Scan Implementation:
* **TCP Stealth Scan (-sS):** Scanned all 65,535 ports to find open "doors" without establishing a full connection.
* **UDP Scan (-sU):** Probed for services like DNS and SNMP that operate on UDP.
* **Service & OS Detection:**
  ```bash
  sudo nmap -sS -sV -O -p- 192.168.56.101
