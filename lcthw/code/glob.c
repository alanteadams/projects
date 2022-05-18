#include <glob.h>
#include <unistd.h>
#include <stdio.h>



int main(int argc, char *argv[]) {
int i = 0;
  glob_t g;

       g.gl_offs = 2;
       glob("*.c", GLOB_DOOFFS, NULL, &g);
//       glob("*.h", GLOB_DOOFFS | GLOB_APPEND, NULL, &g);
       g.gl_pathv[0] = "ls";
       g.gl_pathv[1] = "-l";

       while(g.gl_pathv[i] != NULL) {
         printf("%s\n", g.gl_pathv[i]);
         i++;
       }
}
