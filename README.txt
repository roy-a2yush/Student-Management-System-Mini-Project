This project forms a part of the DBMS Mini project and is developed by Aayush Lal Roy of CMR Institute of Technology, Bangalore.

The project is titled as Student Management System.

------------------------------------------------------------------------------------------------------------------------------

The main Purpose of this Project is for the admin to enter the newly enrolled students into the school data base, and create a login and password for him/her which can be later used by the students to view their respective results.

This project helps the school to contact the students, especially in this pademic period where everything has come online. it is also very convinient for the students, the teachers and the school administration. 

The admin can also enter a new teacher into the database, and assign a class to him/her of which he/she will be the class teacher and one of his/her job will be to enter the marks.
The teacher can do so by logging into the portal with their username and password.

The admin can also, add a staff to the database.
The staff again have their user id and password to login and check their details. This provides scalability for fufture upgrades too.

The teacher, student and staff can also change their passwords later.

------------------------------------------------------------------------------------------------------------------------------

To get started with this project or to see its working, One must first download Xampp or Wampp, or any equivalent localhosting server.

1> 	If the OS is linux, paste the HOGWARTS folder in /opt/lampp/htdocs/
	If the OS is windows, paste the HOGWARTS folder in C://xampp/htdocs/

2>  Turn on the xampp server and mysql server.

3>	type localhost/ on the web- browser

4>	See for phpMyAdmin in the right corner and click on that.

5>	Now, on the left hand side click on new and create a new database and name it "Hogwarts"

6>	Select the newly created database and create 5 tables
		i>  login(Sid(int),uname(varchar(20)),pass(varchar(20)))
			  make uname as the primary key.
			  Add 1 entry to it.
			  Add admin in the uname attribute and admin in the pass attribute too, also add 0 in the Sid Attribute.

		ii> Student(id(int),fname(varchar(50)),lname(varchar(50)),phoneNo(char(10)),gender(char(1)),email(varchar(50)),class(int),username(varchar(20)))
		      make id as the primary key and check AutoIncrement feature. Goto the sql tab and write the query "ALTER TABLE Student ADD CONSTRAINT FOREIGN KEY(username) REFERENCES login(uname);"

		iii> Teacher(id(int),fname(varchar(50)),lname(varchar(50)),phoneNo(char(10)),gender(char(1)),subject(varchar(20)),email(varchar(50)),class(int),username(varchar(20)))
		      make id as the primary key and check AutoIncrement feature. Goto the sql tab and write the query "ALTER TABLE Teacher ADD CONSTRAINT FOREIGN KEY(username) REFERENCES login(uname);"

		iv> Staff(id(int),fname(varchar(50)),lname(varchar(50)),phoneNo(char(10)),gender(char(1)),deptAlloted(varchar(50)),salary(int),username(varchar(20)))
		      make id as the primary key and check AutoIncrement feature. Goto the sql tab and write the query "ALTER TABLE Staff ADD CONSTRAINT FOREIGN KEY(username) REFERENCES login(uname);"

		v> Marks(Sid(int),class(int),Tid(int),History(int),Transfiguration(int),DADA(int),Potions(int),Percentage(float))
		      make id as the primary key and check AutoIncrement feature. Except Sid and class everything else can be NULL, so check the checkbox corresponding to null accordingly. 

7> Add a Procedure peekStaff
	In the parameter write
		BEGIN
		SELECT id, fname, lname, phoneNo, gender, deptAlloted, salary FROM Staff;
		END

8> Click on the Staff table and then on Triggers and add a trigger "deleteStaffRecord"
	In the definition write
		DELETE FROM login WHERE uname = old.username;

8> Click on the Student table and then on Triggers and add a trigger "deleteStudentRecord"
	In the definition write
		DELETE FROM login WHERE uname = old.username;

8> Click on the Teacher table and then on Triggers and add a trigger "deleteTeacherRecord"
	In the definition write
		DELETE FROM login WHERE uname = old.username;


------------------------------------------------------------------------------------------------------------------------------


Your setup is now complete and you afre now ready to go.
type in
localhost/HOGWARTS/login.php
You'll be taken to a page, now since there are no entries and only you being the admin can add people.
select the account type as admin write the username as password both as admin as you had added in the login table and click on login.
You are now logged in as an admin and you can add students teachers staff.
Remember to add different classes for each teacher as a teacher can't be a class teacher of two classes.
Also, add teacher of a particular class only after adding students to that particular class.
Once you create the account. The teacher can login into her account with the username and password you put while registering. They can change the password. See the students that are under thier supervision add and view their marks.

---------------------------------------------------------THE END--------------------------------------------------------------
