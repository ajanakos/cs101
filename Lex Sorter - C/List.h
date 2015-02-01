#ifndef LIST_H_INCLUDE_
#define LIST_H_INCLUDE_
#include <stdio.h>


typedef struct ListObj* List;


// Constructors-Destructors ---------------------------------------------------

List newList(void); // creates an empty List

void freeList(List* pL); // frees List from memory

// Access functions -----------------------------------------------------------

int offEnd(List L); // checks if cursor is off list

int isEmpty(List L); // checks if list is empty

int length(List L); // returns length of List

int getIndex(List L); // returns index of List

int front(List L); // returns front element in List

int back(List L); // returns back elemwnt of List

int getElement(List L); // returns cursor element of List

int equals(List A, List B); // returns 1 if Lists are equal, else returns 0

// Manipulation procedures ----------------------------------------------------

void clear(List L); // resets the List to the empty state, free memory

void moveTo(List L, int i); // moves cursor to ith element

void movePrev(List L); // moves cursor to previous element

void moveNext(List L); // moves cursor to next element

void prepend(List L, int data); // inserts node at front of List

void append(List L, int data); // inserts node at back of List

void insertBefore(List L, int data); // inserts element before cursor element 

void insertAfter(List L, int data); // inserts element after cursor element

void deleteFront(List L); // deletes froent element in list

void deleteBack(List L); // deletes back element in list

void delete(List L); // deletes cursor element in list

// Other operations -----------------------------------------------------------

void printList(FILE* out, List L); // prints list to out file from List L

List copyList(List L); // returns a copy of List L
 
#endif
