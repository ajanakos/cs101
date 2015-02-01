/* Alex Janakos
 *
 * cmps101 => pa4
 *
 * List.c - Bi-directional queue used for storing integers. Contains 
 *
 *
 */

#include <stdio.h>
#include <stdlib.h>
#include "List.h"

typedef struct NodeObj {
   int data;
   struct NodeObj* next;
   struct NodeObj* prev;
} NodeObj;

typedef NodeObj* Node;

typedef struct ListObj {
   Node front;
   Node back;
   Node curr;
   int length;
} ListObj;

Node newNode(int node_data) {
   Node N = malloc(sizeof(NodeObj));
   N->data = node_data;
   N->next = NULL;
   N->prev = NULL;
   return (N);
}

void freeNode(Node* pN) {
   if (pN != NULL && *pN != NULL) {
      free(*pN);
      *pN = NULL;
   }
}

int isEmpty(List L) {
   if (L == NULL) {
      printf("List Error: calling isEmpty() on NULL List\n");
      exit(1);
   }
   return (L->length == 0);
}

// Constructors-Destructors ////////////////////////////////////////////////////

// newList(): Returns List pointing to a new empty List
List newList(void) {
   List L;
   L = malloc(sizeof(ListObj));
   L->front = L->back = L->curr = NULL;
   L->length = 0;
   return (L);
}

//freeList(): Frees all memory associated with List *pL
void freeList(List* pL) {
	if ( pL == NULL || *pL == NULL ) {
		return;
	}
	while ( length(*pL)!=0 ) {
		deleteFront(*pL);
	}
	free(*pL);
	*pL = NULL;
}

// Access Functions ////////////////////////////////////////////////////////////

//length(): Returns the length of L
int length(List L) {
   return (L->length);
}

//offEnd: Returns true if curr is NULL
int offEnd(List L) {
   if (L == NULL) {
      printf("List Error: Calling offEnd() on NULL List\n");
      exit(1);
   }
   return L->curr == NULL;
}


//getIndex(): Returns position of current element if defined

int getIndex(List L) {
   Node N = L->front;
   int z = 0;
   for (z=0; z<length(L); N = N->next, z++) {
       if (N == L->curr)
	  return z;
   }
   return -1;
}

//front(): Returns the value at the front of L
//Pre: length()>0
int front(List L) {
   if (!length(L)>0) {
      printf("List Error: calling front() on an empty List\n");
      exit(1);
   }
   return (L->front->data);
}

//back(): Returns the value at the back of L
//Pre: length()>0
int back(List L) {
   if (!length(L)>0) {
      printf("List Error: calling back() on an empty List\n");
      exit(1);
   }
   return (L->back->data);
}

//getElement(): Returns the value pointed at by curr in L
//Pre: length()>0, getIndex()>=0
int getElement (List L) {
   if (!(length(L)>0 || getIndex(L)>=0)) {
      printf("List Error: calling getElement() on empty List\n");
      exit(1);
   }
   return (L->curr->data);
} 

//equals(): Returns true if List A is identical to List B, else returns false
//Pre:
int equals(List A, List B) {
   int flag = 1;
   Node N = NULL;
   Node M = NULL;
   if (A == NULL|| B == NULL) {
      printf("List Error: calling equals() on NULL List\n");
      exit(1);
   }
   N = A->front;
   M = B->front;
   if (length(A) == length(B)) {
      while (flag && N != NULL) {
         flag = (N->data == M->data);
         N = N->next;
         M = M->next;
      }
      return flag;
   }
   return(0);
}

// Manipulation Procedures /////////////////////////////////////////////////////

//clear(): Sets List to the empty state
void clear (List L) {
   if (L->front==NULL) {
      return;
   }
   while (L->front!=NULL) {
      deleteFront(L);
   }
}

//moveTo(): Moves cursor to index i
//Pre: 0<=i<=length(L)-1
void moveTo(List L, int i) {
   if (!(i>=0 && i<=length(L)-1)) {
     L->curr = NULL;
   }
   else { int j;
     L->curr = L->front;
     for (j=0; j<=i-1; j++) {
        L->curr = L->curr->next;
      }
   }
}

//movePrev(): Moves cursor one step closer to the front
void movePrev(List L) {
   if (0 < getIndex(L) && getIndex(L) <= length(L)-1) 
	L->curr = L->curr->prev;
   else if (getIndex(L)==0 || getIndex(L)==-1)		
	L->curr = NULL;
}

//moveNext(): Moves cursor one step closer to the last element
void moveNext(List L) {
   if (0 <= getIndex(L) && getIndex(L) < length(L)-1)
	L->curr = L->curr->next;
   else if (getIndex(L)==length(L)-1)
	L->curr = NULL;
 
}

//prepend(): Inserts new element at the front of List
void prepend(List L, int data) {
   Node N = newNode(data);
   if (length(L)==0) {
      L->front = L->back = N;
   }
   else {
      N->next = L->front;
      L->front->prev = N;
      L->front = N;
   }
   ++L->length;
}

//append(): Inserts node at the back of List
void append(List L, int data) {
   Node N = newNode(data);
   if (L->front == NULL) {
      L->front = L->back = N;
   }
   else {
      N->prev = L->back;
      L->back->next = N;
      L->back = N;
   }
   ++L->length;
} 

//insertBefore(): Inserts element before cursor in List
//Pre: length()>0, getIndex()>=0
void insertBefore(List L, int data) {
   if (!(length(L)>0 || getIndex(L)>=0)) {
      printf("List Error: calling insertBefore() on empty List\n");
      exit(1);
   }
   Node N = newNode(data);
   if (L->curr == L->front) {
      L->front->prev = N;
      N->next = L->front; 
      L->front = N;
   }
   else {
      N->prev = L->curr->prev;
      L->curr->prev->next = N;
      N->next = L->curr;
      L->curr->prev = N;
   }
   ++L->length;
}

//insertAfter(): Inserts new element after cursor in List
//Pre: length()>0, getIndex()>=0
void insertAfter(List L, int data) {
   if (!( length(L)>0 ||  getIndex(L)>=0)) {
      printf("List Error: Calling insertAfter() on empty List\n");
      exit(1);
   }
   Node N = newNode(data);
   if (L->curr == L->back) {
      L->back->next = N;
      N->prev = L->back;
      L->back = N;
   }
   else {
      N->prev = L->curr;
      N->next = L->curr->next;
      L->curr->next->prev = N;
      L->curr->next = N;
   }
   ++L->length;
}

//deleteFront(): Removes element at the front of List
//Pre: length()>0, getIndex()>=0
void deleteFront(List L) {
   if (!length(L)>0) {
      printf("List Error: Using: deleteFront() to move cursor off List\n");
      exit(1);
   }
   Node N = NULL;
   if (length(L) > 1) {
      L->front = L->front->next;
      L->front->prev = NULL;
   }
   else {
      L->front = L->back = L->curr = NULL;
   }
   --L->length;
   freeNode(&N);
}

//deleteBack(): Removes element at the back of List
//Pre: length()>0
void deleteBack(List L) {
   if (!length(L)>0) {
      printf("List Error: calling deleteBack() on NULL List\n");
      exit(1);
   }
   Node N = NULL;
   N = L->back;
   if (length(L) > 1) {
      L->back = L->back->prev;
      L->back->next = NULL;
   } 
   else {
      L->front = L->back = L->curr = NULL;
   }
   --L->length;
   freeNode(&N);
}

//delete(): Removes curr element in List
//Pre: length()>0, getIndex()>=0
void delete (List L) {
   if (!(length(L)>0 && getIndex(L)>=0)) {
      printf("List Error: calling delete() on NULL List\n");
      exit(1);
   }
   Node N = NULL;
   N = L->curr;
   if (length(L) > 1) {
      if (L->curr->prev == NULL) {
         L->front = L->curr->next;
         L->curr->next = NULL;
      }
      else if (L->curr->next == NULL) {
         L->back = L->curr->prev;
         L->curr->prev = NULL;
      }
      else {
         L->curr->prev->next = L->curr->next;
         L->curr->next->prev = L->curr->prev;
         L->curr->prev = L->curr->next = NULL;
      }
      L->curr = NULL;
   }
   else {
      L->front = L->back = L->curr = NULL;
   }
   --L->length;
   freeNode(&N);
}

// Other Operations ////////////////////////////////////////////////////////////

//printList(): Prints elements of List
void printList(FILE *out, List L) {
   if (L == NULL) {
      printf("List Error: calling printList() on NULL List\n");
      exit(1);
   }
   Node N = L->front;
   for (N = L->front; N != NULL; N = N->next) {
      fprintf(out, "%d ", N->data); 
   }
}

//copyList(): returns a copy of List
List copyList(List L) {
   if (L == NULL) {
      printf("List Error: calling copyList() on Null List\n");
      exit(1);
   }
   List copy = newList();
   Node N = L->front;
   while (N != NULL) {
      append(copy, N->data);
      N = N->next;
   }
   return (copy);
}
