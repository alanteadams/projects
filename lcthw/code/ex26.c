#include <stdlib.h>
#include <stdio.h>
#include <string.h>
#include <stdarg.h>
#include <unistd.h>
// #include <glob.h>
#include "dbg.h"

struct File_names {
	int id;
	char *files;
};

struct Database {
	int MAX_ROWS;
	int MAX_DATA;
	struct File_names *names;
};

struct Connection {
	FILE *fp;
	struct Database *db;
};

int option = 0;

#define MAX_DATA 512
#define MAX_ROWS 100

  struct Connection *database_create(char *fname) {

	struct Connection *conn	= malloc(sizeof(struct Connection));

	conn->db = malloc(sizeof(struct Database));

	 // gcc users
	conn->fp = fopen(fname, "r");

	 conn->db->names = (struct File_names *)malloc(sizeof(struct File_names) * MAX_ROWS);

	 for(size_t i = 0; i < MAX_ROWS; i++) {
					 // call malloc and passes it MAX_DATA and cast it to a char type pointer and assigns it to an a named pointer of type char.
					 char *a = (char *)malloc(MAX_DATA);
					 // calls memset that takes an address to start from, value to be filled and number of bytes to be filled. Used to provide a block of memory with a particular value
					 // but we designed this to create a chunk of memory of pointer type char.
					 memset(a, 0, MAX_DATA);

					 // initialize and struct File_names named finames
					 struct File_names finames = {.id = i, .files= a};
					 // copy over the structure to the rows pointer - making rows elements treating it like an array
					 conn->db->names[i] = finames;
	 }
	 return conn;
}

struct File_names *Get_file_name(char *fname) {
	int i = 0;
	struct Connection *conn = database_create(fname);

	while(fgets(conn->db->names[i].files, MAX_DATA, conn->fp) != NULL) {

         size_t len = strlen(conn->db->names[i].files);
         if (len > 0 && conn->db->names[i].files[len-1] == '\n') {
           conn->db->names[i].files[--len] = '\0';
         }
       			i++;
       		}

	//Close the file if still open.
	if(conn->fp) {
		fclose(conn->fp);
	}
   	return (conn->db->names);
			}

int Search_in_File(char *fname, char *str1, int flag, ...) {

    FILE *fp;
    int find_result = 0;
    char temp[MAX_DATA];

    char *str2;
    char *str3;

    struct test1 {
      char *match1;
      char *match2;
      char *match3;
    };

    struct test1 *tes1 = malloc(sizeof(struct test1));

    va_list ap;

    va_start(ap, flag);

    if((fp = fopen(fname, "r")) == NULL) {
			printf("About to send error from fopen:\n");
        return(-1);
    }

    if(flag == 1) {
    while(fgets(temp, MAX_DATA, fp) != NULL) {
      if((strstr(temp, str1)) != NULL) {

// Assign str1 to match1
      tes1->match1 = str1;

                if(strstr(tes1->match1, str1) != NULL) {
									printf("Return Sentence: %s\n", temp);
                }
          find_result++;
      }
    }

    if(find_result == 0) {
        printf("Couldn't find a match in %s.\n", fname);
    }
    // then check match1
    if(tes1->match1 != NULL) {
			printf("Keyword: %s\n", tes1->match1);
			printf("The Filename: %s\n", fname);
      printf("I have found your match!\n");
    }
  }

  if(flag == 2) {
  str2  = va_arg(ap, char *);
  while(fgets(temp, MAX_DATA, fp) != NULL) {
    if(strstr(temp, str1) != NULL) {

// Assign str1 to match1
    tes1->match1 = str1;

              if(strstr(tes1->match1, str1) != NULL) {
								printf("Return Sentence: %s\n", temp);
              }
        find_result++;
    }

    if(strstr(temp, str2) != NULL) {

// Assign str2 to match2
    tes1->match2 = str2;

              if(strstr(tes1->match2, str2) != NULL) {
								printf("Return Sentence: %s\n", temp);
              }
        find_result++;
    }
  }

  if(find_result == 0) {
      printf("Couldn't find a match.\n");
  }

  if(option == 1) {
    if(tes1->match1 != NULL || tes1->match2 || NULL) {
			printf("The Filename: %s\n", fname);
			printf("Keyword: %s\n", tes1->match1);
			printf("Keyword: %s\n", tes1->match2);
      printf("I have found at least one of the matches!\n");
    }
  } else {
  if(tes1->match1 != NULL && tes1->match2 != NULL) {
		printf("The Filename: %s\n", fname);
		printf("Keyword: %s\n", tes1->match1);
		printf("Keyword: %s\n", tes1->match2);
    printf("I have found both matches!\n");
  }
}
}

if(flag == 3) {
  str2 = va_arg(ap, char *);
  str3 = va_arg(ap, char *);
while(fgets(temp, MAX_DATA, fp) != NULL) {
  if(strstr(temp, str1) != NULL) {

// Assign str1 to match1
  tes1->match1 = str1;

            if(strstr(tes1->match1, str1) != NULL) {
							printf("Return Sentence: %s\n", temp);
            }
      find_result++;
  }

  if(strstr(temp, str2) != NULL) {

// Assign str2 to match2
  tes1->match2 = str2;

            if(strstr(tes1->match2, str2) != NULL) {
							printf("Return Sentence: %s\n", temp);
            }
      find_result++;
  }
  if(strstr(temp, str3) != NULL) {

// Assign str3 to match3
  tes1->match3 = str3;

            if(strstr(tes1->match3, str3) != NULL) {
							printf("Return Sentence: %s\n", temp);
            }
      find_result++;
  }
}

if(find_result == 0) {
    printf("Couldn't find a match.\n");
}

if(option == 1) {
  if(tes1->match1 != NULL || tes1->match2 != NULL || tes1->match3 != NULL) {
		printf("The Filename: %s\n", fname);
		printf("Keyword: %s\n", tes1->match1);
		printf("Keyword: %s\n", tes1->match2);
		printf("Keyword: %s\n", tes1->match3);
    printf("I have found at least of one of your matches\n");
  }
} else {
  if(tes1->match1 != NULL && tes1->match2 != NULL && tes1->match3 != NULL) {
		printf("The Filename: %s\n", fname);
		printf("Keyword: %s\n", tes1->match1);
		printf("Keyword: %s\n", tes1->match2);
		printf("Keyword: %s\n", tes1->match3);
    printf("I have found all three matches!\n");
       }
   }
}

    //Close the file if still open.
    if(fp) {
        fclose(fp);
    }

    printf("\n------------------------------\n");
    return(0);
}


//Our main function
int main(int argc, char *argv[]) {

    int result = 0;
    int flag = 0;
    int c = 0;
    char *filename = NULL;
    char *str1;
    char *str2;
    char *str3;

    struct File_names * filez;

    int i = 0;

    check(((argc >= 2) && (argc <= 5)), "Usage: %s <string> ...\n%s version 1.0 \nCopyright(c) alanteadams.com\n", filename, filename);

    //Use system("clear") on Unix/Linux
    // system("clear");

    filez = Get_file_name("logfind.txt");
		check(filez, "Failed to return filez");

    while ((c = getopt(argc, argv, "o:")) != -1) {
        switch (c) {
          case 'o':
            option = 1;
            break;
          case '?':
            printf("Word Word Word\n");
						log_err("You need some arguments after o");
            break;
          default:
            printf("%d\n", c);
        }
      }

    if(option == 1) {
			argc--;
			argv++;

			argc--;
			argv++;

			str1 = *argv;

			debug("argc: %d", argc);

			debug("str1: %s", str1);
			if (++argv != NULL) {
				str2 = *argv++;
				debug("str2: %s", str2);
			}
			if(*argv != NULL) {
				str3 = *argv;
				debug("str3: %s", str3);
			}
		 } else {
			 argc--;
 			 argv++;

		    str1 = *argv;
				debug("argc: %d", argc);

				debug("str1>: %s", str1);
		    if (++argv != NULL) {
		      str2 = *argv++;
				debug("str2>: %s", str2);
		    }
		    if(*argv != NULL) {
		      str3 = *argv;
					debug("str3>: %s", str3);
		    }
			}

    while(strcmp(filez[i].files, "")) {

			filename = filez[i].files;

    switch(argc) {
      case 1:
               flag = 1;
               result = Search_in_File(filename, str1, flag);
               if(result == -1) {
                   perror("Error");
                   printf("Error number = %d\n", errno);
                   exit(1);
             }
              break;

      case 2:
              flag = 2;
              result = Search_in_File(filename, str1, flag, str2);
              if(result == -1) {
                  perror("Error");
                  printf("Error number = %d\n", errno);
                  exit(1);
             }
             break;

     case 3:
            flag = 3;
						debug("I am in case 3:");
            result = Search_in_File(filename, str1, flag, str2, str3);
            if(result == -1) {
                perror("Error");
                printf("Error number = %d\n", errno);
                exit(1);
           }
           break;
   }
	 i++;
 }

	printf("All files have been scanned!\n");
	exit(0);
 error:
		 exit(-1);
}
