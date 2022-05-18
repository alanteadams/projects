
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

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

#define MAX_DATA 512
#define MAX_ROWS 100


struct File_names *Get_file_name(char *fname) {
//	FILE *fp;

	int i = 0;
//	char *temp = NULL;

 struct Connection *conn	= malloc(sizeof(struct Connection));

 conn->db = malloc(sizeof(struct Database));

// struct File_names *finames = malloc(sizeof(struct File_names));

	// gcc users
	if((conn->fp = fopen(fname, "r")) == NULL) {
		// return(-1);
	}

//  temp = (char *)malloc(MAX_DATA);

	conn->db->names = (struct File_names *)malloc(sizeof(struct File_names) * MAX_ROWS);

	for(size_t i = 0; i < MAX_ROWS; i++) {
					// call malloc and passes it MAX_DATA and cast it to a char type pointer and assigns it to an a named pointer of type char.
					char *a = (char *)malloc(MAX_DATA);
					// calls memset that takes an address to start from, value to be filled and number of bytes to be filled. Used to provide a block of memory with a particular value
					// but we designed this to create a chunk of memory of pointer type char.
					memset(a, 0, MAX_DATA);

					// initialize and struct Address named addr.
					struct File_names finames = {.id = i, .files= a};
					// copy over the structure to the rows pointer - making rows elements treating it like an array
					conn->db->names[i] = finames;
	}




	while(fgets(conn->db->names[i].files, 512, conn->fp) != NULL) {
//		 finames->files[find_result] = temp;
//		 printf("n%s >>>>>fun", conn->db->names[i].files);
			// save into a structure.
			i++;
		}

//	if(conn->db->names[i].files) {
//		printf("%dn", i);
//		printf("[%s]n", conn->db->names[i - 1].files);
//	}

	//Close the file if still open.
	if(conn->fp) {
		fclose(conn->fp);
	}
   	return (conn->db->names);
}


//Our main function.
int main(int argc, char *argv[]) {

//	int i = 0;

	struct File_names * filez;
//	int errno = 0;


//  while(g.gl_pathv[i]) != NULL)
	filez = Get_file_name(argv[1]);

/*
	while (filez[i].files && (filez[i].id != 5)) {
		printf("%s", filez[i].files);
//		printf("%dn", filez[i].id);
		i++;
	}
		if(filez == -1) {
		perror("Error");
		printf("Error number = %d\n", errno);
		exit(1);
	}
*/
	return(0);
}
