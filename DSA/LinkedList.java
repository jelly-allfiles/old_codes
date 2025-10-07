/*
 List Operations:
 - addFirst - done (method: addFirst())
 - addLast - done (method: addLast())
 - getFirstElement - done (method: getFirstElement())
 - getLastElement - done (method: getLastElement())
 - removeFirst - done (method: removeFirst())
 - removeLast - done (method: removeLast())
 - insertItemAt(int pos,int item) - done (method: insertItemAt())
 - removeItemAt(int pos) - done (method: removeItemAt())
 - getPosition - done (method: getPosition())
 - isFound - done (method: isFound())
 
*/
public class LinkedList {
    Node head;
    Node tail;
    int count = 0;

    // addLast operation
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

    // addFirst operation
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

// get firstElement operation
    public int getFirstElement() {
        try {
            return head.getItem();
        } catch (Exception e) {
            System.out.println("List is empty!");
            return -1;
        }
    }

    // getLastElement operation
    public int getLastElement() {
        try {
            return tail.getItem();
        } catch (Exception e) {
            System.out.println("List is empty!");
            return -1;
        }
    }

    // removeFirst operation
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

    // removeLast operation
    public void removeLast() {
        if (isEmpty()) {
            return;
        }
        if (count == 1) {
            head = tail = null;
            count--;
            return;
        }
        Node prev = head;
        Node p = head.getLink();
        while (p.getLink() != null) {
            prev = prev.getLink();
            p = p.getLink();
        }
        prev.setLink(null);
        tail = prev;
        count--;
    }
      // insertItemAt operation
    public void insertItemAt(int pos, int item) {
        if (pos < 0 || pos > count) {
            System.out.println("Invalid position!");
            return;
        }
        if (pos == 0) {
            addFirst(item);
            return;
        }
        if (pos == count) {
            addLast(item);
            return;
        }
        Node newNode = new Node(item);
        Node current = head;
        for (int i = 0; i < pos - 1; i++) {
            current = current.getLink();
        }
        newNode.setLink(current.getLink());
        current.setLink(newNode);
        count++;
    }
    // removeItemAt operation
    public void removeItemAt(int pos) {
        if (pos < 0 || pos >= count || isEmpty()) {
            System.out.println("Invalid position or list is empty!");
            return;
        }
        if (pos == 0) {
            removeFirst();
            return;
        }
        if (pos == count - 1) {
            removeLast();
            return;
        }
        Node current = head;
        for (int i = 0; i < pos - 1; i++) {
            current = current.getLink();
        }
        current.setLink(current.getLink().getLink());
        count--;
    }

        // getPosition operation
    public int getPosition(int item) {
        Node current = head;
        int position = 0;
        while (current != null) {
            if (current.getItem() == item) {
                return position;
            }
            current = current.getLink();
            position++;
        }
        return -1; // Item not found
    }

    // isFound operation
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
        System.out.println("List contains: " + list);
        list.removeLast();
        System.out.println("List contains after removeLast(): " + list);
        list.insertItemAt(2, 9);
        System.out.println("List after insert 9 at position 2: " + list);
        list.removeItemAt(1);
        System.out.println("List after removing item at position 1: " + list);
        System.out.println("Position of 7: " + list.getPosition(7));
        System.out.println("Is 8 found? " + list.isFound(8));
        System.out.println("Is 11 found? " + list.isFound(11));
    }
}


class Node {
    private int item;
    private Node link;

    public Node(int item) {
        this.item = item;
        this.link = null;
    }

    public Node(int item, Node link) {
        this.item = item;
        this.link = link;
    }

    public int getItem() {
        return item;
    }

    public void setItem(int item) {
        this.item = item;
    }

    public Node getLink() {
        return link;
    }

    public void setLink(Node link) {
        this.link = link;
    }
}
