#include <unistd.h>
#include <sys/types.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

/* I should probably get rid of this... */
void give_shell()
{
	gid_t gid = getegid();
	setresgid(gid, gid, gid);
	system("/bin/sh -i");
}

int main(int argc, char **argv)
{
	char buffer[256];
	int pos = 0;

	printf("Welcome to the circular buffer manager:\n\n");
	while(1)
	{
		int len;
		printf("How many bytes? "); fflush(stdout);
		scanf("%u", &len);
		fgets(buffer, 2, stdin);

		if (len == 0) break;

		printf("Enter your data: "); fflush(stdout);
		if (len < 256 - pos)
		{
			fgets(&buffer[pos], len, stdin);
			pos += len;
		}
		else
		{
			fgets(&buffer[pos], 256 - pos, stdin);
			len -= (256 - pos);
			pos = 0;

			fgets(&buffer[0], len, stdin);
			pos += len;
		}

		printf("\n");
	}

	return 0;
}
