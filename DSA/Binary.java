import java.util.Scanner;

public class Binary {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        System.out.print("Enter the number of elements: ");
        int n = scanner.nextInt();
        int[] array = new int[n];
        
        System.out.println("Enter the elements (sorted): ");
        for (int i = 0; i < n; i++) {
            array[i] = scanner.nextInt();
        }
        
        System.out.print("Enter the element to search: ");
        int target = scanner.nextInt();
        
        int result = binary(array, target);
        
        if (result == -1) {
            System.out.println(target + " not found.");
        } else {
            System.out.println(target + " found at index: " + result);
        }

        
        System.out.print(" Enter the element to search: ");
        int target2 = scanner.nextInt();
        
        int result2 = binary(array, target2);
        
        if (result2 == -1) {
            System.out.println(target2 + " not found.");
        } else {
            System.out.println(target2 + " found at index: " + result2);
        }
        
        
        scanner.close();
    }

    public static int binary(int[] array, int target) {
        int left = 0;
        int right = array.length - 1;

        while (left <= right) {
            int mid = left + (right - left) / 2;

            if (array[mid] == target) {
                return mid;
            }
            if (array[mid] < target) {
                left = mid + 1;
            } else {
                right = mid - 1;
            }
        }
        return -1;
    }
}
