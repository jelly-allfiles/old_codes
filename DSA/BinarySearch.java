import java.util.Arrays;
public class BinarySearch {

    public static void main(String[] args)
    {

          int arr[] = { 1, 5, 3, 10, 22, 35 };


        Arrays.sort(arr);

        int target= 10;
        
          int res = Arrays.binarySearch(arr, target);

        if (res >= 0)
            System.out.println(target + " found at index = " + res);
        else
            System.out.println(target + " Not found");

        target = 4;
        res = Arrays.binarySearch(arr, target);
          
        if (res >= 0)
            System.out.println(target + " found at index = " + res);
        else
            System.out.println(target + " Not found");
    }
}
