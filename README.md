# NetScan

A simple PHP-based IP and Port Scanner with IP information lookup.

## Features
- Scan common ports (21, 22, 25, 53, 80, 110, 143, 443, 3306, 8080)
- Display open/closed status
- Fetch IP information (Country, City, ISP)
- Simple web interface with Bootstrap
- Works both locally and online

## Installation
1. Clone the repo:
   git clone https://github.com/baursh/NetScan.git
2. Go into the folder:
   cd NetScan
3. Load autoload:
   composer dump-autoload
4. Start PHP server:
   php -S localhost:8000 -t public

Then open in your browser:  
http://localhost:8000/?ip=8.8.8.8

## Example
![screenshot](https://imgur.com/a/oAAUIAZ)

## License
[MIT License](./LICENSE)

