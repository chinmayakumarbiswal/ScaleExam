
![Logo](https://chinmayakumarbiswal.github.io/ScaleExam/images/logo.png)


# ScaleExam

Online Exam system where you manage your classroom, engage your students, Safe, Simple, Free.


## Run Locally

Go to file location

```bash
cd /var/www/html
```

Clone this project

```bash
git clone https://github.com/chinmayakumarbiswal/ScaleExam.git
```

Open project in google chrome

```bash
google-chrome http://localhost/ScaleExam
```

Open project in firefox

```bash
firefox http://localhost/ScaleExam
```


## Deployment

EC2 User data for Amazon Linux 2

```bash
#! /bin/bash

sudo yum update -y

sudo amazon-linux-extras install -y lamp-mariadb10.2-php7.2 php7.2

sudo yum install -y httpd mariadb-server

sudo systemctl start httpd

sudo systemctl enable httpd

sudo usermod -a -G apache ec2-user

sudo chown -R ec2-user:apache /var/www

sudo chmod 2775 /var/www && find /var/www -type d -exec sudo chmod 2775 {} \;

cd /var/www/html/

sudo yum install git -y 

git clone https://github.com/chinmayakumarbiswal/ScaleExam.git


```


## SDK

To run this project, you need to add the following SDK file


`Composer `

Install Composer

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

```

`aws-sdk-php`

Install AWS SDK for  PHP

```bash
composer require aws/aws-sdk-php

php -d memory_limit=-1 composer.phar require aws/aws-sdk-php

```




## Screenshots


![Logo](https://chinmayakumarbiswal.github.io/ScaleExam/gitdata/Slide1.JPG)


![Logo](https://chinmayakumarbiswal.github.io/ScaleExam/gitdata/Slide2.JPG)


![Logo](https://chinmayakumarbiswal.github.io/ScaleExam/gitdata/Slide3.JPG)


![Logo](https://chinmayakumarbiswal.github.io/ScaleExam/gitdata/Slide4.JPG)


![Logo](https://chinmayakumarbiswal.github.io/ScaleExam/gitdata/Slide5.JPG)


![Logo](https://chinmayakumarbiswal.github.io/ScaleExam/gitdata/Slide6.JPG)


![Logo](https://chinmayakumarbiswal.github.io/ScaleExam/gitdata/Slide7.JPG)


![Logo](https://chinmayakumarbiswal.github.io/ScaleExam/gitdata/Slide8.JPG)


![Logo](https://chinmayakumarbiswal.github.io/ScaleExam/gitdata/Slide9.JPG)



## Authors

- [@chinmayakumarbiswal](https://www.github.com/chinmayakumarbiswal)


## Feedback

If you have any feedback, please reach out me at situ@chinmayakumarbiswal.in

