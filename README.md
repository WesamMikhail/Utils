# Lorenum\Utils

Utils is a simple library of helpful code snippets that I have either written myself or found online.

All the functions listed in this library are meant to be static.

Example functions

```
Arrays::fullIntersect($array1, $array2); # returns true if ALL the values in $array1 exists in $array2

Strings::generateRandomAlphaNumericString(25); # generate a random string of length 25

Validator::startsWith("My name is x","x"); # returns true if the first argument starts with "x", which it doesn't!
```

There are a bunch of other functions in the /src folder.

## TODO

- Add tests