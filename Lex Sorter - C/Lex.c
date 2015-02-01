/*
Alex Janakos

cmps101 => pa2

Lex.c - Sorts in file Lexocographically using List ADT module then writes to out file
*/

#include <stdio.h>
#include <stdlib.h>
#include "List.h"
#include <string.h>

int main(int argc, char *argv[])
{	
	if(argc != 3) {
   		printf("Invalid number of inputs");
    		exit(1);
     	}
	
	int n_lines = 0;
	char line[254];

	FILE* in = fopen(argv[1], "r");
	FILE* out = fopen(argv[2], "w");
	
	// counts number of lines in input files
	while (fgets(line, 254, in) != NULL) {
		n_lines++;
	}
	fclose(in);
	
	// places the strings in file into an array
	int x = 0;
	char *array[n_lines];
	
	in = fopen(argv[1], "r");
	while (fgets(line, 254, in) != NULL){ 
		array[x] = strdup(line);
		x++;
	}
	fclose(in);


	// inserts array in lex order into List
	List L = newList();

        append(L, 0);
	int i=0;
	int j=0;
      	for (i = 0; i < n_lines-1; i++) {
    		  moveTo(L, 0);
    		  for (j = -i ; j < 1; j++) {
    			if (strcmp(array[getElement(L)], array[i+1])>0) {  
    				  insertBefore(L, i+1);
    				  j = 1;
    		 	 }
    		 	else if (getIndex(L) == length(L)-1) {
    				  append(L, i+1);
    				  j = 1;
    			}		 
    			else 
    				 moveNext(L); 		  
    		  }  
        }
	
	// print List to out file
	moveTo(L, 0);
	while (getIndex(L)!=-1) {
		fprintf(out, "%s", array[getElement(L)]);
		moveNext(L);
	}
	fclose(out);

	// free memory
	int a=0;
	for (a=0; a<n_lines; a++) {
		free(array[a]);
	}
	freeList(&L);
}
