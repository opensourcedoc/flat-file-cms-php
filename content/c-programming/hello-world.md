# Hello World in C

## Prologue

This article demonstrates a Hello World program in C.

## Example

```c
/* Include the standard I/O library. */
#include <stdio.h>

/* The main function of a C program. */
int main(void)
{
    /* Print out some text to stdandard output. */
    printf("Hello World\n");

    /* Return a program status. */
    return 0;
}
```

## Compilation

Here is a pseudo command to compile and run C code:

```shell
$ gcc -Wall -Wextra -o program source.c
$ ./program
Hello World
```

## README

Hello World programs aim to try development environments for beginners. This post shows a C version of a Hello World program.