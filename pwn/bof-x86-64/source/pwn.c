#include <stdio.h>
#include <unistd.h>
#include <stdlib.h>

void bingo(){
    system("cat ./flag");
}

void vuln(){
    char buffer[16] = {0};
    printf("Can you control my legs?\n");
    read(0, buffer, 0x100);
}

void welcome(){
    printf("Welcome to Sniperoj!\n");
}

int main(){
    setvbuf(stdout, NULL, _IOLBF, 0);
    welcome();
    vuln();
    return 0;
}
