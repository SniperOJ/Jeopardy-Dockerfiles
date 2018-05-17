#include <stdio.h>
#include <string.h>
#include <unistd.h>
#include <stdlib.h>

void vuln(){
    char buffer[0x200] = {0};
    printf("Can you control my legs?\n");
    int i = 0;
    char ch = 0;
    for(i = 0; i < 0x200; i++){
        read(0, &ch, 1);
        // \n
        if (ch == '\n' || ch == '\x00'){
            buffer[i] = 0;
            break;
        }
        // printable
        if (ch >= 0x20 && ch <= 0x7f){
            buffer[i] = ch;
        }else{
            char *error = "I don't know unprintable character!\n";
            write(1, error, strlen(error));
            exit(1);
        }
    }
    void(*evil)();
    evil = (void *)buffer;
    evil();
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
