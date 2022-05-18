// Including a list of header files
#include <stdio.h>
#include <assert.h>
#include <stdlib.h>
#include <errno.h>
#include <string.h>
#include <stdarg.h>

// Make an Address struct with element int id and set and four pointer type chars name, email, password, website.
struct Address {
        int id;
        int set;
        char *name;
        char *email;
        char *password;
        char *website;
};
// Make a Database struct with elements MAX_ROWS and MAX_DATA integers with a pointer named rows of type struct Address.
struct Database {
        int MAX_ROWS;
        int MAX_DATA;
        struct Address *rows;
};
// Make a Connection struct with a pointer of type FILE named file and a pointer of type struct Database with a pointer named db.
struct Connection {
        FILE *file;
        struct Database *db;
};
//  a function named Database_close that takes a conn pointer of type struct connection. This function free's the memory back to the OS system.
void Database_close(struct Connection *conn)
{
  // if conn is not NULL
        if(conn) {
          // a for loop that has size_t (unsigned integral must be positive) iterator that starts at zero; as long as the iterator < MAX_ROWS; iterate after code.
                for(size_t i = 0; i < conn->db->MAX_ROWS; i++) {
                  // declare a pointer named row of type struct Address that gets assigned the address of rows pointer with the incrementor
                        struct Address *row = &conn->db->rows[i];
                  // if name is not NULL free the memory.
                  // if email is not NULL free the memory.
                  // if password is not NULL free the memory.
                  // if website is not NULL free the memory.

                        if(row->name) free(row->name);
                        if(row->email) free(row->email);
                        if(row->password) free(row->password);
                        if(row->website) free(row->website);
                }
                // if rows is not NULL free the memory.
                // if db is not NULL free the memory.
                // if file is not NULL run the close function to close the file.
                if(conn->db->rows) free(conn->db->rows);
                if(conn->db) free(conn->db);
                if(conn->file) fclose(conn->file);
                // if conn is not NULL free the memory.
                free(conn);
        }
}

void die(const char *message, int flag,  ...)
{

    struct Connection *conn;

    va_list ap;

    va_start(ap, flag);

    if (errno) {
        perror(message);
    } else {
        printf("ERROR: %s\n", message);
    }

    if (flag) {

    conn = va_arg(ap, struct Connection *);
    Database_close(conn);
    }

    va_end(ap);

    exit(1);
}

// a function named Address_print that takes a pointer named addr of type struct Address.
void Address_print(struct Address *addr)
{
  // print the id, name, email from addr
        printf("%d %s %s %s %s\n", addr->id, addr->name, addr->email, addr->password, addr->website);
}
// Database_load that takes a pointer named conn of type struct Connection
void Database_load(struct Connection *conn)
{
  // assert that there is an address in db and file of the conn pointer of struct Connection if not show error.
        assert(conn->db && conn->file);
  // if fread does not equal 1 execute the die function and pass it conn [so that it can run the Database_close function] and print the "error" message.
  // fread takes a conn->db pointer of, size Database, take 1 of the Database size, and pass it whatevers in conn->file.
        if(fread(conn->db, sizeof(struct Database), 1, conn->file) != 1) {
                die("Failed to load database.", 1, conn);
          }
  // assigned the amount of rows to rows by calling the malloc function to allocated dynamically the memory size of struct Address and casting it to
  // a pointer of type address * whatever the MAX_ROWS.
        conn->db->rows = (struct Address *)malloc(sizeof(struct Address) * conn->db->MAX_ROWS);
  // a for loop that has size_t (unsigned integral must be positive) iterator that starts at zero; as long as the iterator < MAX_ROWS; iterate after code.
        for(size_t i = 0; i < conn->db->MAX_ROWS; i++) {
          // get the address of conn->db->rows[i] and pass it to the pointer named row of type struct Address
                struct Address *row = &conn->db->rows[i];
                // if fread does not equal to 1, call the die function otherwise copy the file pointer into the address of row->id, at the sizeof and int and only 1
                if(fread(&row->id, sizeof(int), 1, conn->file) != 1)
                        die("Failed to load id.", 1, conn);
                // if fread does not equal to 1, call the die function otherwise copy the file pointer into the address of row->set, at the sizeof and int and only 1
                if(fread(&row->set, sizeof(int), 1, conn->file) != 1)
                        die("Failed to load set.", 1, conn);
                // call the function malloc and pass it the MAX_DATA and assigned the memory to name
                // call the functiuon malloc and pass it the MAX_DATA and assigned the dynamically allocated memory to email.
                row->name = malloc(conn->db->MAX_DATA);
                row->email = malloc(conn->db->MAX_DATA);
                row->password = malloc(conn->db->MAX_DATA);
                row->website = malloc(conn->db->MAX_DATA);
                // if fread does not equal to 1, call the die function if fread copy whatevers in conn->file to row->name up to MAX_DATA size but only 1
                if(fread(row->name, conn->db->MAX_DATA, 1, conn->file) != 1) die("Failed to load name", 1, conn);
                // if fread does not equal to 1, call the die function if fread copy whatevers in conn->file to row->email up to MAX_DATA size but only 1
                if(fread(row->email, conn->db->MAX_DATA, 1, conn->file) != 1) die("Failed to load email", 1, conn);
                // if fread does not equal to 1, call the die function if fread copy whatevers in conn->file to row->password up to MAX_DATA size but only 1
                if(fread(row->password, conn->db->MAX_DATA, 1, conn->file) != 1) die("Failed to load password", 1, conn);
                // if fread does not equal to 1, call the die function if fread copy whatevers in conn->file to row->website up to MAX_DATA size but only 1
                if(fread(row->website, conn->db->MAX_DATA, 1, conn->file) != 1) die("Failed to load website", 1, conn);
        }
}
// function named Database_open that takes a pointer name fiilename of type const char, and mode of type char.
struct Connection *Database_open(const char *filename, char mode)
{
  // call function malloc to dynamically allocated memory to the conn pointer of type struct Connection.
        struct Connection *conn = malloc(sizeof(struct Connection));
  // if conn is NULL die with error message.
        if(!conn) die("Memory error", 1, conn);
  // call function malloc to dynamically allocate memory to the db pointer of type struct Database
        conn->db = malloc(sizeof(struct Database));
        // if conn->db is NULL die with error message.
        if(!conn->db) die("Memory error", 1, conn);
        // if mode pass is char 'c' open file in write mode. It will create it if it doesn't exist
        // else if mode is something else open in read and write.
        if(mode == 'c') {
                conn->file = fopen(filename, "w");
        } else {
                conn->file = fopen(filename, "r+");
                // if file is not NULL call the Database_load function and pass it the conn pointer of type struct Connection.
                if(conn->file) {
                        Database_load(conn);
                }
        }
        // if conn->file does not exist run the die function with error message.
        if(!conn->file) die("Failed to open the file", 1, conn);
        // return conn a pointer of type struct Connection
        return conn;
}
// a function named Database_create that takes a pointer name conn of type Connection
void Database_create(struct Connection *conn)
{
        // print to the user
        printf("MAX_ROWS: ");
        // accept integer type by setting placeholder. this to MAX_ROWS address - accept input from user.
        scanf("%d", &conn->db->MAX_ROWS);
        // if the MAX_ROWS is less than zero. die with error message.
        if (conn->db->MAX_ROWS <= 0) die("MAX_ROWS must be positive", 1, conn);
        // print to the user
        printf("MAX_DATA: ");
        // accept integer type by setting placeholder. this to MAX_ROWS address - accept input from user.
        scanf("%d", &conn->db->MAX_DATA);
        // if the MAX_DATA is less than zero. die with error message.
        if (conn->db->MAX_DATA <= 0) die("MAX_DATA must be positive", 1, conn);


        // malloc struct address and cast it to and address pointer after multiply by the MAX_ROWS
        conn->db->rows = (struct Address *)malloc(sizeof(struct Address) * conn->db->MAX_ROWS);
        // a for loop that iterate from a positive 0 to i is less than MAX_ROWS and iterates.
        for(size_t i = 0; i < conn->db->MAX_ROWS; i++) {
                // call malloc and passes it MAX_DATA and cast it to a char type pointer and assigns it to an a named pointer of type char.
                char *a = (char *)malloc(conn->db->MAX_DATA);
                // calls memset that takes an address to start from, value to be filled and number of bytes to be filled. Used to provide a block of memory with a particular value
                // but we designed this to create a chunk of memory of pointer type char.
                memset(a, 0, conn->db->MAX_DATA);
                // call malloc and passes it MAX_DATA and cast it to a char type pointer and assings it to an a named pointer of type char.
                char *b = (char *)malloc(conn->db->MAX_DATA);
                // calls memset that takes an address to start from, value to be filled and number of bytes to be filled. Used to provide a block of memory with a particular value
                memset(b, 0, conn->db->MAX_DATA);

                char *c = (char *)malloc(conn->db->MAX_DATA);
                memset(c, 0, conn->db->MAX_DATA);

                char *d = (char *)malloc(conn->db->MAX_DATA);
                memset(d, 0, conn->db->MAX_DATA);

                // initialize and struct Address named addr.
                struct Address addr = {.id = i, .set = 0, .name = a, .email = b, .password = c, .website = d};
                // copy over the structure to the rows pointer - making rows elements treating it like an array
                conn->db->rows[i] = addr;
        }
}
// a function named Database_write that takes a pointer named conn of type struct Connection.
void Database_write(struct Connection *conn)
{
        // rewind function set the read/write head of the file back to the beginning.
        rewind(conn->file);
        // just reading the rewinded file to the whatever the conn->db is pointing at otherwise die.
        if(fwrite(conn->db, sizeof(struct Database), 1, conn->file) != 1) die("Failed to write database.", 1, conn);
        // for loop that iterates from zero to less than MAX_ROWS and iterates and post increments.
        for (size_t i = 0; i < conn->db->MAX_ROWS; i++) {
                // writes from the file to whatever the conn->db->rows address is pointing to otherwise die.
                if(fwrite(&((conn->db->rows[i]).id), sizeof(int), 1, conn->file) != 1)
                        die("Failed to write id.", 1, conn);
                if(fwrite(&((conn->db->rows[i]).set), sizeof(int), 1, conn->file) != 1)
                        die("Failed to write set.", 1, conn);
                if(fwrite((conn->db->rows[i]).name, conn->db->MAX_DATA, 1, conn->file) != 1)
                        die("Failed to write name.", 1, conn);
                if(fwrite((conn->db->rows[i]).email, conn->db->MAX_DATA, 1, conn->file) != 1)
                        die("Failed to write email.", 1, conn);
                if(fwrite((conn->db->rows[i]).password, conn->db->MAX_DATA, 1, conn->file) != 1)
                        die("Failed to write password.", 1, conn);
                if(fwrite((conn->db->rows[i]).website, conn->db->MAX_DATA, 1, conn->file) != 1)
                        die("Failed to write website.", 1, conn);
        }
        // empties the buffers of the output stream.
        fflush(conn->file);
}
// a function named Database_set that takes a conn pointer of type Connection, id, char pointer named name, and a char pointer email
void Database_set(struct Connection *conn, int id, char *name, char *email, char *password, char *website)
{
    // get the address of this pointer and assigned to addr of type struct Address.
        struct Address *addr = &conn->db->rows[id];
        // if this specific addr is set die with error message.
        if(addr->set) die("Already set, delete it first", 1, conn);
        // now set the addr to 1
        addr->set = 1;
        // make sure strncpy don't give me a bug by set a NULL byte at the end of name, email, password and website
        name[conn->db->MAX_DATA - 1] = '\0';
        email[conn->db->MAX_DATA - 1] = '\0';
        password[conn->db->MAX_DATA - 1] = '\0';
        website[conn->db->MAX_DATA - 1] = '\0';


        // copy name to the address->name up to the NULL byte.
        // copy email to the address->email

        strncpy(addr->name, name, conn->db->MAX_DATA);
        strncpy(addr->email, email, conn->db->MAX_DATA);
        strncpy(addr->password, password, conn->db->MAX_DATA);
        strncpy(addr->website, website, conn->db->MAX_DATA);
}
// a function named Database_get that takes a conn pointer of type Connection and an id
void Database_get(struct Connection *conn, int id)
{
  // get the address of this pointer and assign it to addr pointer.
        struct Address *addr = &conn->db->rows[id];
  // if the addr->set is not NULL
        if(addr->set) {
          // call the address_print function. - basically will print everything in addr.
                Address_print(addr);
          // else die.
        } else {
                die("ID is not set", 1, conn);
        }
}

// a function named Database_delete that takes a conn and a id.
void Database_delete(struct Connection *conn, int id)
{
  // malloc the size of MAX_DATA and cast the void pointer to char * and assign it to a
        char *a = (char *)malloc(conn->db->MAX_DATA);
  // malloc the size of MAX_DATA and cast the void pointer to char * and assign it to b
        char *b = (char *)malloc(conn->db->MAX_DATA);
        char *c = (char *)malloc(conn->db->MAX_DATA);
        char *d = (char *)malloc(conn->db->MAX_DATA);

        // free name
        // free email
        free(conn->db->rows[id].name);
        free(conn->db->rows[id].email);
        free(conn->db->rows[id].password);
        free(conn->db->rows[id].website);
        // declare a structure of type Address and initilize.
        struct Address addr = {.id = id, .set = 0, .name = a, .email = b, .password = c, .website = d};
        // copy structure over to the structure that rows is pointing to.
        conn->db->rows[id] = addr;
}
// a function named Database_list is a function that takes a conn
void Database_list(struct Connection *conn)
{
  // for loop throgh the rows.
        for(size_t i = 0; i < conn->db->MAX_ROWS; i++) {
          // if the rows->set is set.
                if(conn->db->rows[i].set) {
                  // print whats in the rows address in memory
                        Address_print(&(conn->db->rows[i]));
                }
        }
}
// Database_find that takes a conn and a keyword.
void Database_find(struct Connection *conn, char *keyword) {
  // declares and initilizes an integer i.
        int i = 0;
  // declares and initilized an integer counter
        int count = 0;
  // while i < less than MAX_ROWS check and see if the row is set and then check for the keyword then break when you find it.
        while (i < conn->db->MAX_ROWS) {
                while ( i < conn->db->MAX_ROWS) {
                        if(conn->db->rows[i].set == 1){
                          // if strstr does not equal NULL find the string keyword in the name or email
                                if(strstr(conn->db->rows[i].name, keyword) != NULL || strstr(conn->db->rows[i].email, keyword) != NULL || strstr(conn->db->rows[i].password, keyword) != NULL || strstr(conn->db->rows[i].website, keyword) != NULL){
                                        break;
                                }
                        }
                        i++;
                }
    // first while loop  checks to see if i is set wrong then break. [i don't think i need this line] why do i need this line.

                if(i >= conn->db->MAX_ROWS) break;
    // print all that is in the address struct.
                Address_print(&(conn->db->rows[i]));
                count++;
                i++;
        }

        if (count == 0) {
                printf("Try some other words\n");
        }
}

int main(int argc, char *argv[])
{
        if(argc < 3) die("USAGE: ex17sss <dbfile> <action> [action params]", 0);
        int id = 0;
        if(argc > 3) id = atoi(argv[3]);

        char *filename = argv[1];
        char action = argv[2][0];
        struct Connection *conn = Database_open(filename, action);

        switch(action) {
        case 'c':
                Database_create(conn);
                Database_write(conn);

                printf("\nDone\n");
                break;

        case 'g':
                if(argc != 4) die("Need an id to get", 1, conn);

                Database_get(conn, id);
                break;

        case 's':
                if(argc != 8) die("Need id, name, email, password, and website to set", 1, conn);

                Database_set(conn, id, argv[4], argv[5], argv[6], argv[7]);
                Database_write(conn);
                break;

        case 'd':
                if(argc != 4) die("Need id to delete", 1, conn);

                Database_delete(conn, id);
                Database_write(conn);
                break;

        case 'l':
                Database_list(conn);
                break;

        case 'f':
                if(argc != 4) die("Need keyword to search.", 1, conn);
                Database_find(conn, argv[3]);
                break;

        default:
                die("Invalid action, only: c=create, g=get, s=set, d=delete, l=list， f=find", 1, conn);
        }

        Database_close(conn);
        return 0;
}
