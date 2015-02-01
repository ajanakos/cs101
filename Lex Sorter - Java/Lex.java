import java.io.*;

class Lex{
   public static void main(String[] args) throws IOException{
     
      // checks that there are two arguments
      if (args.length != 2){
          System.out.println("Usage: Lex infile outfile");
	  System.exit(1);
      }
		  
      String inFile = args[0]; 
      String outFile = args[1];  
      String line = "";
      int n_lines = 0;
      
      // counts # of lines in text file
      BufferedReader l_count = new BufferedReader(new FileReader(inFile));
      while ((line = l_count.readLine()) != null) {
          n_lines++;
      }
      l_count.close();
      
      // array for lines of text file
      String[] array = new String[n_lines];
      
      // reads text file
      BufferedReader reader = new BufferedReader(new FileReader(inFile));
      for (int i = 0; (line = reader.readLine()) != null; i++) {
          array[i] = line;
      }
      reader.close();
        
      // insert array in lex order into list  
      List L = new List();
      L.append(0);
      for (int i = 0; i < n_lines-1; i++) {
    	  L.moveTo(0);
    	  for (int j = -i ; j < 1; j++) {
    		  if (array[L.getElement()].compareTo(array[i+1])>0) {  
    			  L.insertBefore(i+1);
    			  j = 1;
    		  }
    		  else if (L.getIndex() == L.length()-1) {
    			  L.append(i+1);
    			  j = 1;
    		  }		 
    		  else 
    			 L.moveNext(); 		  
    	  }  
      }
      
      // writing to file from List 
      PrintWriter write = new PrintWriter(outFile);
      L.moveTo(0);
      for (int i = 0; i < n_lines-1; i++) { 
    	  write.println(array[L.getElement()]);
    	  L.moveNext();
      }
      write.println(array[L.back()]);
      write.close(); 
   }
}    	  
    	  
