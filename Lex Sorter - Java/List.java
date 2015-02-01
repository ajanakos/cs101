

public class List {
	public class dllnode {
		
		private int data;
		private dllnode next;
		private dllnode prev;
		
		public dllnode(int data) {
	        this.data = data;
	        this.next = null;
	        this.prev = null;
	    }	
	}
	
	// fields
	private dllnode front = null;
	private dllnode back = null;
	private dllnode cursor = null;
	private int length = 0;
	
	// List(): creates an empty list
	List() {
		cursor = null;
		back = null;
		front = null;
		length = 0;
	}
	
	// access functions /////////////////////////////////////////////////////
	
	// length(): returns length of list
	public int length() {
		return this.length;
	}
	
	// getIndex(): returns index of cursor node or -1 if null cursor
	public int getIndex() {
		dllnode tmp = this.front;
		for (int i = 0; i < length(); tmp = tmp.next, i++) {
				if (tmp == this.cursor)
					return i;				
		}		
		return -1;
	}
	
	// front(): returns front data
	// Pre: length()>0
	public int front() { 
		if (!(length()>0)) {
			throw new RuntimeException("List Error: front() called on empty list");
        } 
		return this.front.data;
	}
	
	// back(): returns back data
	// Pre: length()>0
	public int back() {
		if (!(length()>0)) {
			throw new RuntimeException("List Error: front() called on empty list");
        } 
		return this.back.data;
	}
	
	// getElement(): returns cursor data
	// Pre: length()>0, getIndex()>=0
	public int getElement() {
		if (!(length()>0 || getIndex()>=0)) {
			 throw new RuntimeException("List Error: getElement() called on null cursor");  
        } else 
        	return this.cursor.data;
	}
	
	// equals(): returns true if lists are identical, else returns false
	boolean equals(List L) {
		dllnode A = this.front;
		dllnode B = L.front;
		int x = 0;
		if (this.length() == L.length()) {
			while (A != null) {
				if ((A.data == B.data)) {
					x++;
				}
				A = A.next;
				B = B.next;
			}
		}
		if (L.length() == x)
			return true;
		else
			return false;
		
		
	}
	
	// manipulations procedures ///////////////////////////////////////
	
	
	
	// movePrev(): moves cursor element to previous node in list
	public void movePrev() {
		if (0 < getIndex() && getIndex() <= length()-1) 
			this.cursor = this.cursor.prev;
		else if (getIndex()==0 || getIndex()==-1)		
			this.cursor = null;
	} 
	
	// moveNext(): moves cursor element to next node in list
	public void moveNext() {
		if (0 <= getIndex() && getIndex() < length()-1)
			this.cursor = this.cursor.next;
		else if (getIndex()==length()-1)
			this.cursor = null;
	}
	
	// clear(): resets list to empty state
	public void clear() {
		this.front = null;
		this.back = null;
		this.cursor = null;
		this.length = 0;
	}
	
	// moveTo(): moves cursor to element at index i, or cursor becomes undefined
	// Pre: 0<=i<=length()-1
	public void moveTo(int i) {
		 if (!(i>=0 && i<=length()-1)) {
			 this.cursor = null;
			 throw new RuntimeException("List Error: moveTo() cursor cannot be moved outside the list");
		 }
			 this.cursor = this.front;
			 for (int x = 0; x <= i-1; x++)
				this.cursor = this.cursor.next;
	}
	
	// append(): inserts new element into the back of the list
	public void append (int data) {
		dllnode n = new dllnode(data);
		n.data = data;
		if (this.front == null) {
			this.front = n;
			this.back = n;
		}
		else {
			n.prev = this.back;
			this.back.next = n;
			this.back = n;
		}
		this.length++;
	}
	
	// prepend(): inserts new element into the front of the list
	public void prepend (int data) {	
		dllnode n = new dllnode(data);
		n.data = data;
		if (this.front == null) {
			this.front = n;
			this.back = n;
			
		}else {
			n.next = this.front;
			this.front.prev = n;
			this.front = n;
		}
		this.length++;
		
	}
	
		// insertAfter(): inserts new element after the cursor element in this list
		// Pre: length()>0, getIndex()>=0
		public void insertAfter(int data) {
			if (!(length()>0 || getIndex()>=0))
				throw new RuntimeException("List Error: insertAfter() called on empty list or null cursor");
			
			dllnode n = new dllnode(data);
			n.data = data;
			if (this.cursor == this.back) {
				this.back.next = n;
				n.prev = this.back;
				this.back = n;
				this.length++;
			}
			else {
				n.next = this.cursor.next;
				this.cursor.next.prev = n;
				n.prev = this.cursor;
				this.cursor.next = n;
				this.length++;
			}	
		}		
		
		// insertBefore(): inserts new element before the cursor element in this list
		// Pre: length()>0, getIndex()>=0
		public void insertBefore (int data) {
			if (!(length()>0 || getIndex()>=0))
				throw new RuntimeException("List Error: insertBefore() called on empty list or null cursor");
			
			dllnode n = new dllnode(data);
			n.data = data;
			if (this.cursor == this.front) {
				this.front.prev = n;
				n.next = this.front;
				this.front = n;
				this.length++;
			}	
			else  {
				n.prev = this.cursor.prev;
				this.cursor.prev.next = n;
				n.next = this.cursor;
				this.cursor.prev = n;
				this.length++;
			}		
		}											
	
	// delete(): deletes cursor element in this list
	// Pre: length()>0, getIndex()>=0
	public void delete() {
		if (!(length()>0 || getIndex()>=0))
			throw new RuntimeException("List Error: delete() called on empty list or null cursor");
		this.cursor.prev.next = this.cursor.next;
		this.cursor.next.prev = this.cursor.prev;
		this.cursor = null;
		this.length--;
	}
	
	// deleteFront(): deletes front element of this list
	// Pre length()>0
	public void deleteFront() {
		if (!(length()>0))
			throw new RuntimeException("List Error: deleteFront() called on empty list");
		this.front = this.front.next;
		this.front.prev = null;
		this.length--;	
	}
	
	// deleteBack(): deletes back element of this list
	// Pre length()>0
	public void deleteBack() {
		if (!(length()>0))
			throw new RuntimeException("List Error: deleteBack() called on empty list");
		this.back = this.back.prev;
		this.back.next = null;
		this.length--;
	}	
	
	// Other methods /////////////////////////////////////////////////////////////////////
	
	// toString(): overrides Objects toString method
	public String toString() {
		if (front == null)
			return "Empty List";
		else {
			String result = "";
			dllnode tmp = this.front;
			result += tmp.data;
			while(tmp.next != null){
				tmp = tmp.next;
				result += " " + tmp.data;
			}
			return result;
		}
	}
	
	// copy(): returns a new copy of 
	public List copy() {
		List newList = new List();
		dllnode tmp = this.front;
		for (; tmp != null; tmp = tmp.next) {
			newList.append(tmp.data);
		}
		newList.cursor = null;
		return newList;
	}		
}
