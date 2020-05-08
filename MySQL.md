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

```sql
INSERT INTO accounts (USERNAME, PASSWORD) VALUES ("username", "password");
```

### Go in the `mysql.php` and change the values
# After account creation delete adduser.php or add:
```php
<?php
session_start();
session_destroy();
header("Location: index.php");
?>
```