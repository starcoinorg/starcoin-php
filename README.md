# starcoin-php
starcoin php sdk

# How to use

## composer
```shell
composer require starcoin/starcoin
```

# Examples

## query stc balance

```php
    $myAddressHash = "0x0000000000000000000000000000000";
    $starcoin = new StarcoinClient("https://main-seed.starcoin.org/");
    $balance = $starcoin->getBalanceOfStc()
    echo $balance;
```


## transfer

```php
    $starcoin = new StarcoinClient("https://main-seed.starcoin.org/");
```
