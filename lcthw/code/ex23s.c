#include <stdio.h>
#include <string.h>
#include "dbg.h"

#define LAYDUFF(x, y) \
    case (8 * (x) + (y) + 1): *to++ = *from++

#define SEVEN_AT_ONCE(x) \
    LAYDUFF(x, 6); \
    LAYDUFF(x, 5); \
    LAYDUFF(x, 4); \
    LAYDUFF(x, 3); \
    LAYDUFF(x, 2); \
    LAYDUFF(x, 1); \
    LAYDUFF(x, 0)

#define EIGHT_AT_ONCE(x)    \
    LAYDUFF(x, 7);           \
    SEVEN_AT_ONCE(x)

int valid_copy(char *data, int count, char expects)
{
    int i = 0;
    for (i = 0; i < count; i++) {
        if (data[i] != expects) {
            log_err("[%d] %c != %c", i, data[i], expects);
            return 0;
        }
    }

    return 1;
}


int duffs_device(char *from, char *to, int count)
{
    {
        int n = (count + 31) / 32;

        switch(count % 32) {
            case 0:
                do { *to++ = *from++;
                    SEVEN_AT_ONCE(3);
                    EIGHT_AT_ONCE(2);
                    EIGHT_AT_ONCE(1);
                    EIGHT_AT_ONCE(0);
                    } while(--n > 0);
        }
    }

    return count;
 }

 int main(int argc, char *argv[])
 {
     char from[65] = { 'a' };
     char to[65] = { 'c' };
     int rc = 0;

     // setup the from to have some stuff
     memset(from, 'x', 65);
     // set it to failure mode
     memset(to, 'y', 65);


     // duffs version
     rc = duffs_device(from, to, 65);
     check(rc == 65, "Duff's device failed: %d", rc);
     check(valid_copy(to, 65, 'x'), "Duff's device failed copy.");
     printf("%d\n", rc);


     return 0;
 error:
     return 1;
 }
