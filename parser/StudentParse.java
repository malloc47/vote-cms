import java.io.*;

public class StudentParse {
  public static void main(String[] args) throws IOException
  {
    BufferedReader inData = new BufferedReader(new FileReader("students.txt"));
    PrintWriter outData = new PrintWriter(new FileWriter("mysql.txt"));
    String currentLine;
    String lineArray[];
    currentLine = inData.readLine();
    do {

      String userID1;
      String userID2;
      String userID3;
      String firstName;
      String lastName;
      String level;
      int levelint;
      String password;
      String gender;

      String emailName;
      String emailNameParse[];
      String email;


// Template: INSERT INTO authuser(uname, uname2, uname3, passwd, firstname, lastname, team, level, status, lastlogin) VALUES("test", "test2", "test3", "47", "testname1", "testname2", "Voters", "47" ,"active", NOW());


      lineArray = currentLine.split(";");
      userID1 = lineArray[0];
      level = lineArray[1];
      levelint = Integer.parseInt(level);
      emailName = lineArray[2];
      lastName = lineArray[3];
      firstName = lineArray[4];
      password = lineArray[5];
//      gender= lineArray[6];
      gender = "0";

      emailNameParse = emailName.split(", ");

      if(emailNameParse[0].length() > 6)
        userID2 = emailNameParse[0].substring(0,6)+emailNameParse[1].substring(0,2);
      else
        userID2 = emailNameParse[0]+emailNameParse[1].substring(0,2);
      userID3 = emailNameParse[1].substring(0,2)+emailNameParse[0];

      email = emailNameParse[1] + "." + emailNameParse[0] + "@domain.com";

      userID1 = userID1.toLowerCase();
      userID2 = userID2.toLowerCase();
      userID3 = userID3.toLowerCase();
      email = email.toLowerCase();

      outData.println("INSERT INTO authuser(uname, uname2, uname3, passwd, firstname, lastname, email, team, level, status, lastlogin, gender) VALUES(\""+userID1+"\",\""+userID2+"\",\""+userID3+"\",\""+password+"\",\""+firstName+"\",\""+lastName+"\",\""+email+"\",\""+"Voters"+"\",\""+levelint+"\",\""+"active"+"\",NOW(),\""+gender+"\");");
      outData.println();
      currentLine = inData.readLine();
    }
    while (currentLine != null);
    inData.close();
    outData.close();
  }
}
