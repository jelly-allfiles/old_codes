import java.util.Arrays;

public class StringAlgorithms {

    // 1. String Reversal
    public static String reverseString(String str) {
        if (str == null || str.isEmpty()) {
            return str;
        }
        StringBuilder reversed = new StringBuilder(str);
        return reversed.reverse().toString();
    }

    // 2. Palindrome check
    public static boolean isPalindrome(String str) {
        if (str == null || str.isEmpty()) {
            return true;
        }
        String cleanStr = str.replaceAll("[^a-zA-Z0-9]", "").toLowerCase();
        int left = 0;
        int right = cleanStr.length() - 1;
        while (left < right) {
            if (cleanStr.charAt(left) != cleanStr.charAt(right)) {
                return false;
            }
            left++;
            right--;
        }
        return true;
    }

    // 3. String Anagram check
    public static boolean isAnagram(String str1, String str2) {
        if (str1 == null || str2 == null || str1.length() != str2.length()) {
            return false;
        }
        char[] charArray1 = str1.toLowerCase().toCharArray();
        char[] charArray2 = str2.toLowerCase().toCharArray();
        Arrays.sort(charArray1);
        Arrays.sort(charArray2);
        return Arrays.equals(charArray1, charArray2);
    }

    // 4. Substring Search (Naive Approach)
    public static int naiveSubstringSearch(String text, String pattern) {
        if (text == null || pattern == null || pattern.isEmpty()) {
            return 0;
        }
        int n = text.length();
        int m = pattern.length();
        for (int i = 0; i <= n - m; i++) {
            int j;
            for (j = 0; j < m; j++) {
                if (text.charAt(i + j) != pattern.charAt(j)) {
                    break;
                }
            }
            if (j == m) {
                return i; // Match found
            }
        }
        return -1; // No match found
    }

    // 5. String to Integer (atoi)
    public static int stringToInt(String str) {
        if (str == null || str.isEmpty()) {
            return 0;
        }
        int result = 0;
        int sign = 1;
        int i = 0;

        str = str.trim();
        if ( i < str.length() && (str.charAt(i) == '+' || str.charAt(i) == '-')) {
        sign = (str.charAt(i++) == '-' ) ? -1: 1;
        }
        while ( i < str.length() && Character.isDigit (str.charAt(i))) {
         int digit = str.charAt(i) - '0';
         if (result > (Integer.MAX_VALUE - digit) / 10) {
             return (sign == 1) ? Integer.MAX_VALUE : Integer.MIN_VALUE;
         }
         result = result * 10 + digit;
         i++;
        }
        return result * sign;
    }

    // 6. Integer to String
    public static String intToString(int num) {
        if (num == 0) {
            return "0";
        }
        boolean isNegative = num < 0;
        if (isNegative) {
            num = -num;
        }
        StringBuilder sb = new StringBuilder();
        while (num > 0) {
            sb.append(num % 10);
            num /= 10;
        }
        if (isNegative) {
            sb.append('-');
        }
        return sb.reverse().toString();
    }

    // 7. Count Occurrences of a Character 
    public static int countCharacterOccurrences(String str, char target) {
        if (str == null || str.isEmpty()) {
            return 0;
        }
        int count = 0;
        for (char c : str.toCharArray()) {
            if (c == target) {
                count++;
            }
        }
        return count;
    }

    
    public static void main(String[] args) {
        String testString = "Hello, Section Year!";
        System.out.println ("Reversed: " + reverseString(testString));

        System.out.println ("Is 'madam' a palindrome? " + isPalindrome("madam"));
        System.out.println ("Is 'hello' a palindrome? " + isPalindrome("hello"));

        System.out.println ("Is 'listen' an anagram of 'silent'? " + isAnagram("listen", "silent"));
         System.out.println ("Is 'hello' an anagram of 'world'? " + isAnagram("hello", "world"));

         System.out.println ("Substring 'Second Year' found at index: " + naiveSubstringSearch(testString, "Second Year"));
          System.out.println ("Substring 'Java' found at index: " + naiveSubstringSearch(testString, "Java"));

          System.out.println ("String to int: " + stringToInt("   -42"));
          System.out.println ("String to int: " + stringToInt(" 4193 with words"));
          System.out.println ("Int to String: " + intToString(-123));
          System.out.println("Int to String: " + intToString(456));

          System.out.println ("Occurrence of 'l' in 'Hello, Second Year!': " + countCharacterOccurrences (testString, 'l'));
    }
}