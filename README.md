# [SoulGames](https://github.com/SoulGames) / [Website](https://github.com/SoulGames/Website)

[![Discord](https://img.shields.io/discord/612932518819135498?label=Discord&style=for-the-badge)](https://discord.SoulGames.de/)
[![Twitter](https://img.shields.io/twitter/follow/SoulGames?color=%23&label=Twitter&style=for-the-badge)](https://twitter.com/SoulGames_RPG)

[![GitHub forks](https://img.shields.io/github/forks/SoulGames/Website?style=for-the-badge)](https://github.com/SoulGames/Website/network/members)
[![GitHub stars](https://img.shields.io/github/stars/SoulGames/Website?style=for-the-badge)](https://github.com/SoulGames/Website/stargazers)
[![GitHub watchers](https://img.shields.io/github/watchers/SoulGames/Website?style=for-the-badge)](https://github.com/SoulGames/Website/watchers)

</center>

## 💽 Install

- Download the repository as [ZIP-File](https://github.com/SoulGames/Website/archive/master.zip) and extract it to your Webserver.

- Go to `admin/mysql.php` and set your settings for the MySQL/MariaDB Database.

- Run the following SQL Commands in your Database:

```sql
CREATE TABLE changelog(
    ID INT(11) AUTO_INCREMENT UNIQUE,
    TITLE VARCHAR(255),
    CHANGENEWS VARCHAR(2550),
    CREATED_AT VARCHAR(255)
);
```

```sql
CREATE TABLE accounts(
    USERNAME VARCHAR(255) UNIQUE,
    PASSWORD VARCHAR(255)
);
```

- Go to `admin/addUser` and add your Account.

- Add in `admin/addUser/index.php` before the HTML DOCTYPE:

```php
<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: ../index.php");
  exit;
}
?>
```

- Succesfully installed!

## 👤 Authors

#### 👤 StackNeverFlow

* Website: [LinusL.de](https://www.linusl.de)
* Twitter: [@StackNeverFlow](https://twitter.com/StackNeverFlow)
* Github: [@StackNeverFlow](https://github.com/StackNeverFlow)

#### 👤 No Name Pro

* Website: [NoNamePro0.GitHub.io](https://NoNamePro0.github.io)
* Twitter: [@NoNamePro0](https://twitter.com/NoNamePro0)
* Github: [@NoNamePro0](https://github.com/NoNamePro0)

## 🤝 Contributing

Contributions, issues and feature requests are welcome!<br>
Feel free to check [issues page](https://github.com/SoulGames/Website/issues). 

## ⭐️ Show your support

Give a ⭐️ if this project helped you! We would be very happy!
