### Create the changelog table

```sql
CREATE TABLE `changelog` (
  `ID` int(11) NOT NULL UNIQUE AUTO_INCREMENT,
  `TITLE` varchar(255) DEFAULT NULL,
  `CHANGENEWS` varchar(5000) DEFAULT NULL,
  `CREATED_AT` varchar(255) DEFAULT NULL,
  `CAT` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```

```sql
CREATE TABLE betakeys(
    ID INT(11) AUTO_INCREMENT UNIQUE,
    BETAPW VARCHAR(255) UNIQUE
);
```

```sql
CREATE TABLE betausers(
    ID INT(11) AUTO_INCREMENT UNIQUE,
    BETAPW VARCHAR(255) UNIQUE,
    isB TINYINT(1)
);
```

```sql
CREATE TABLE accounts(
    USERNAME VARCHAR(255) UNIQUE,
    PASSWORD VARCHAR(255)
);
```

### Go in the `mysql.php` and change the values
# After account creation delete admin/addUser/index.php or add befor the HTML DOCTYPE:
```php
<?php
session_start();
session_destroy();
header("Location: ../index.php");
?>
```
