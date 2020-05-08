### Create the changelog table

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

### Go in the `mysql.php` and change the values
# After account creation delete admin/addUser/index.php or add befor the HTML DOCTYPE:
```php
<?php
session_start();
if(!isset($_SESSION["username"])){
  header("Location: ../index.php");
  exit;
}
?>
```
