/*header file that deals with the standard input output stream*/
#include <stdio.h>
/*assert header file check and and see if something is true if not it produces an error*/
#include <assert.h>
/*converts strings */
#include <stdlib.h>
/*returns an integer number for an error to determine what went wrong*/
#include <errno.h>
/*header file of string manipulations -header file defines functions and variables*/
#include <string.h>
/*macros which are constants that the preprocessor (cpp) set up before the program is run*/
#define MAX_DATA 512
#define MAX_ROWS 100
/*Address structure with id set chars defined*/
struct Address {
  int id;
  int set;
  char name[MAX_DATA];
  char email[MAX_DATA];
};
/*inside the Database struct there is a address struct named rows that can have 100 elements*/
struct Database {
  struct Address rows[MAX_ROWS];
};
/*Connection struct that has a FILE struct pointer from the C standard library named file and a Database struct with a pointer named db*/
struct Connection {
  FILE *file;
  struct Database *db;
};
/*function named die that exits the program if errno has a value or something else. because if erno is set there is an error*/
void die(const char *message)
{
  /*if 1 do something else anyother number do the else*/
  if (errno) {
      perror(message);
  } else {
      printf("ERROR: %s\n", message);
  }
/*exit program*/
  exit(1);
}
/*function named Address_print that dereferences id, name, email and prints the value*/
void Address_print(struct Address *addr)
{
    printf("%d %s %s\n", addr->id, addr->name, addr->email);
}
/*Database_load that takes a struct Connection pointer name conn*/
void Database_load(struct Connection *conn)
{
  // size_t fread(void *ptr, size_t size, size_t nmemb, FILE *stream)
  /*get the value of whats ever in file and copy it to the Address struct [chunk of memory] in the the Database struct*/
  // sizeof(struct Database) --- size in bytes of each element to be read. # of elements of size (bytes of elements to be read.)
  // if the number is different then nmemb then there is an error because it should return size_t the number that is successfully read.
  int rc = fread (conn->db, sizeof(struct Database), 1, conn->file);
  if (rc != 1)
      die("Failed to load database.");
}
/* returns a struct Connection with a pointer function named Database_open that takes a char named filename (that can't be changed) and a char named mode */
struct Connection *Database_open(const char *filename, char mode)
{
  /*create pointer name conn of type struct connection dynamically generate raw memory the size the struct to a pointer named conn*/
    struct Connection *conn = malloc(sizeof(struct Connection));
    /*if conn points at nothing run the die function*/
    if (!conn)
        die("Memory error!");
    /*dynamically allocate and assign the memory to the pointer address -- points to the memory location*/
    conn->db = malloc(sizeof(struct Database));
    /*if conn->db pointer value db doesn't point to anything -- die.*/
    if (!conn->db)
      die("Memory error!");
    /*if the user passed c do this*/
    if (mode == 'c') {
      /*open the file in write mode*/
      conn->file = fopen(filename, "w");
    } else {
      /*open the file in read and write mode don't create or delete the file if it doesn't exist*/
      conn->file = fopen(filename, "r+");
      /*if file is pointing to something call the Database_load and pass it conn*/
      if (conn->file) {
          Database_load(conn);
      }
    }
    /*if nothing is in the file die function with a message*/
    if (!conn->file)
        die("Failed to open file");

    return conn;
}

void Database_close(struct Connection *conn)
{
    if (conn) {
        if (conn->file)
            fclose(conn->file);
        if (conn->db)
            free(conn->db);
        free(conn);
    }
}
/*function name Database_write that takes a conn pointer of struct connection type*/
void Database_write(struct Connection *conn)
{
  /*rewind the head of the file back to the beginning*/
    rewind(conn->file);
    /*write the conn->file to the conn->db, get the size and the amount of elements*/
    int rc = fwrite(conn->db, sizeof(struct Database), 1, conn->file);
    /*if the amount of elements read don't equal nmemb than give an error.*/
    if (rc != 1)
        die("Failed to write to database.");
    /*if flushs the buffer of the stdout if error it calls die function*/
    rc = fflush(conn->file);
    if (rc == -1)
        die("Cannot flush database.");
}
/*function named Database_create that takes a conn pointer of type struct Connection*/
void Database_create(struct Connection *conn)
{
  /*declares and initialize counter i*/
    int i = 0;
    /*for loop the iterates from 0 to 100*/
    for (i = 0; i < MAX_ROWS; i++) {
      // declare addr struct
        // make a prototype to initialize it
        struct Address addr = {.id = i,.set = 0 };
        // then just assign it
        conn->db->rows[i] = addr;
    }
}
/*function named Database_set that takes a conn pointer of stuct Connection type, id, name pointer of type char (that can't be changed)
and a email pointer of type char that can't be changed */
void Database_set(struct Connection *conn, int id, const char *name,
        const char *email)
        /*get the address of the struct rows elements and assign it to pointer addr*/
{
    struct Address *addr = &conn->db->rows[id];
    /*dereference addr and get the value of set if there is a value in set die*/
    if (addr->set)
        die("Already set, delete it first");
    /*assign set to 1*/
    addr->set = 1;
    // WARNING: bug, read the "How To Break It" and fix this
    /*strncpy takes the const char *name that was passed (src) and passes it to the destination up to MAX_DATA*/
    char *res = strncpy(addr->name, name, MAX_DATA);
    //demonstrate the strncpy bug
    /*if it's null run the die error.*/
    if (!res)
        die("Name copy failed");

    res = strncpy(addr->email, email, MAX_DATA);
    if (!res)
        die("Email copy failed");
}
/*function call Database_get that takes a conn pointer of type struct Connection and an int id*/
void Database_get(struct Connection *conn, int id)
{
    /*gets the address of the struct Address rows element*/
    struct Address *addr = &conn->db->rows[id];
    /*if there is an address value call database_open function*/
    if (addr->set) {
       Address_print(addr);
       /*else die if id is not set -- set is either 1 or 0*/
    } else {
       die("ID is not set");
    }
}
/*database_delete function that takes a conn pointer of type struct Connection and int id.*/
void Database_delete(struct Connection *conn, int id)
{
    /*declare and initialize the addr -- and set to 0 that specific id.*/
    struct Address addr = {.id = id, .set = 0 };
    conn->db->rows[id] = addr;
}
/*a function called Database_list that takes a conn pointer of type struct Connection*/
void Database_list(struct Connection *conn)
{
  /*declare and initialize a counter*/
  int i = 0;
  /*dereference conn and assigned it to a pointer db of type struct Database*/
  struct Database *db = conn->db;
  /*for loop that loops through the address of the rows elements of type struct Address*/
  for (i = 0; i < MAX_ROWS; i++) {
      struct Address *cur = &db->rows[i];
      /*if cur set is 1 call function Address_print*/
      if (cur->set) {
          Address_print(cur);
      }
  }
}

int main(int argc, char *argv[])
{
    /*if argc is less than three die with a format message*/
    if (argc < 3)
        die("USAGE: ex17 <dbfile> <action> [action params]");
    /*db filename*/
    char *filename = argv[1];
    /*argv[2][0] research to confirm.*/
    char action = argv[2][0];
    /*calls the function Database_open that takes a filename and action and assigns it to conn pointer of type struct Connection*/
    struct Connection *conn = Database_open(filename, action);
    /*declares an initilizes and id*/
    int id = 0;

    if (argc > 3) id = atoi(argv[3]);
    if (id >= MAX_ROWS) die ("There's not that many records.");

    switch (action) {
        case 'c':
            Database_create(conn);
            Database_write(conn);
            break;

        case 'g':
            if (argc != 4)
                die("Need an id to get");

            Database_get(conn, id);
            break;

        case 's':
            if (argc != 6)
                die("Need id, name, email to set");

            Database_set(conn, id, argv[4], argv[5]);
            Database_write(conn);
            break;

        case 'd':
            if (argc != 4)
                die("Need id to delete");

            Database_delete(conn, id);
            Database_write(conn);
            break;

        case 'l':
            Database_list(conn);
            break;
        default:
            die("Invalid action: c=create, g=get, s=set, d=del, l=list");
    }

    Database_close(conn);

    return 0;
}
