# PHP

This is a Conent management project created using PHP

#!/bin/bash
yum update -y
yum install httpd -y
systemctl start httpd
systemctl enable httpd
cd /var/www/html

echo "Something"

curl http://169.254.169.254/latest/user-data
