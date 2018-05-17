#include <stdio.h>
#include <unistd.h>
#include <string.h>

void init(){
    setvbuf(stdout, NULL, _IOLBF, 0);
}

void welcome(){
	char *words = "Dancing in shackles, Right?\n";
	write(1, words, strlen(words));
}

void vuln(){
	char buffer[16] = {0};
	read(0, buffer, 0x80);
}

int main(){
    init();
    welcome();
    vuln();
	return 0;
}
