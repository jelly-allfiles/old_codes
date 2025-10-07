public class Linkedlist2 {
   Node head;
   Node tail;
   int count = 0;

   public void addLast(int item) {
      if (isEmpty())
         tail = head = new Node(item);
      else {
         Node temp = new Node(item);
         tail.setLink(temp);
         tail = temp;
      }
      count++;
   }

   public void addFirst(int item) {
      if (isEmpty())
         tail = head = new Node(item);
      else {
         Node temp = new Node(item, head);
         head = temp;
      }
      count++;
   }

   public boolean isEmpty() {
      return count == 0;
   }

   public int getFirstElement() {
      try {
         return head.getItem();
      } catch (Exception e) {
         System.out.println("List is empty!");
         return -1;
      }
   }

   public int getLastElement() {
      try {
         return tail.getItem();
      } catch (Exception e) {
         System.out.println("List is empty!");
         return -1;
      }
   }

   public void removeFirst() {
      if (!isEmpty()) {
         if (count == 1)
            head = tail = null;
         else {
            Node temp = head;
            head = head.getLink();
            temp.setLink(null);
         }
         count--;
      }
   }

   public void removeLast() {
      if (!isEmpty()) {
         Node prev = head;
         Node p = head.getLink();
         while (p.getLink() != null) {
            prev = prev.getLink();
            p = p.getLink();
         }
         prev.setLink(null);
         tail = prev; // Update tail reference
         count--;
      }
   }

   public void insertItemAt(int pos, int item) {
      if (pos < 0 || pos > count) {
         System.out.println("Position out of bounds");
         return;
      }
      if (pos == 0) {
         addFirst(item);
      } else if (pos == count) {
         addLast(item);
      } else {
         Node temp = new Node(item);
         Node current = head;
         for (int i = 0; i < pos - 1; i++) {
            current = current.getLink();
         }
         temp.setLink(current.getLink());
         current.setLink(temp);
         count++;
      }
   }

   public void removeItemAt(int pos) {
      if (pos < 0 || pos >= count) {
         System.out.println("Position out of bounds");
         return;
      }
      if (pos == 0) {
         removeFirst();
      } else {
         Node current = head;
         for (int i = 0; i < pos - 1; i++) {
            current = current.getLink();
         }
         current.setLink(current.getLink().getLink());
         if (pos == count - 1) {
            tail = current; // Update tail reference if last element is removed
         }
         count--;
      }
   }

   public int getPosition(int item) {
      Node current = head;
      int pos = 0;
      while (current != null) {
         if (current.getItem() == item) {
            return pos;
         }
         current = current.getLink();
         pos++;
      }
      return -1; // Item not found
   }

   public boolean isFound(int item) {
      return getPosition(item) != -1;
   }

   public String toString() {
      StringBuffer sb = new StringBuffer();
      sb.append("{");
      for (Node p = head; p != null; p = p.getLink())
         sb.append(p.getItem() + ", ");
      sb.append("}");
      return sb.toString();
   }

   public static void main(String[] args) {
      LinkedList list = new LinkedList();
      list.addLast(6);
      list.addLast(5);
      list.addLast(7);
      list.addLast(8);
      list.addLast(10);
      // list.removeLast();
      System.out.println("List contains: " + list);
      list.removeLast();
      System.out.print("List contains after removeLast(): " + list);
      //Insert Item
       list.insertItemAt(2, 9);
        System.out.println("\nList after insert 9 at position 2: " + list);
        //remove Item  
        list.removeItemAt(1);
        System.out.println("List after removing item at position 1: " + list);
        //Get Position
        System.out.println("Position of 7: " + list.getPosition(7));
         //isFound
        System.out.println("Is 8 found? " + list.isFound(8));
        System.out.println("Is 11 found? " + list.isFound(11));

   }
}
