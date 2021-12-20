# Project Name: Simple Arcade
## Project Summary: This project will create a simple Arcade with scoreboards and competitions based on the implemented game.
## Github Link: https://github.com/BangTheBanger/IT202-009/tree/prod
## Project Board Link: https://github.com/BangTheBanger/IT202-009/projects/1
## Website Link: https://fa367-prod.herokuapp.com/Project/login.php
## Your Name: Filipe Atanes

<!--
### Line item / Feature template (use this for each bullet point)
#### Don't delete this

- [ ] \(mm/dd/yyyy of completion) Feature Title (from the proposal bullet point, if it's a sub-point indent it properly)
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
### End Line item / Feature Template
--> 
### Proposal Checklist and Evidence

<table><tr><td>Milestone 1</td></tr><tr><td><table><tr><td>F1 - User will be able to register a new account</td></tr><tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/87](https://github.com/BangTheBanger/IT202-009/pull/87)</p></td></tr><tr><td><table><tr><td>F1 - Form Fields<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143796444-68c887b5-8593-4dec-b5df-d31a5508deeb.png"><p>The register page has the Username, email, password, and confirm password fields. Email is required and must be validated. Username is also required. And it confirms the passwords match.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F1 - Users Table<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143796614-9c4ec25d-ae4b-469e-b328-4a5ba1420f18.png"><p>The table includes: id, username, email, password (60 characters), created, modified.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F1 - Password must be hashed (plain text passwords will lose points)<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143796614-9c4ec25d-ae4b-469e-b328-4a5ba1420f18.png"><p>The password is hashed</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F1 - Email should be unique<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143796830-1a80e6f0-8b0b-4ca7-8e25-408175958bff.png"><p>The email column is unique.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F1 - Username should be unique<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143796901-3072d652-0d2f-4fd4-88c1-e4bdbbeb2768.png"><p>The username column is unique.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F1 - System should let user know if username or email is taken and allow the user to correct the error without wiping/clearing the form<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143796982-6d60e6c4-6589-43f9-88e3-737955444cc7.png"><p>The email is already used, and the server warns the user, without wiping the form, except for passwords.</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143797056-d32eebfd-b9cd-42e3-947c-3420c0807632.png"><p>The username is already used, and the server warns the user, without wiping the form, except for passwords.</td></tr></td></tr></table></td></tr><table><tr><td>F2 - User will be able to login to their account (given they enter the correct credentials)</td></tr><tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/87](https://github.com/BangTheBanger/IT202-009/pull/87)</p></td></tr><tr><td><table><tr><td>F2 - Form<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143797426-403ffd6a-9558-4963-88f7-124735e667c1.png"><p>User can login with email or username, despite the field saying "Email" (This will be patched). Password is required.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F2 - User should see friendly error messages when an account either doesn’t exist or if passwords don’t match<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143797549-b7aca032-883f-4723-89e2-0fbe48d5269c.png"><p>The warning the user receives if he types an account that doesn't exist. This will change from "email" to "account" not found.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F2 - Logging in should fetch the user’s details (and roles) and save them into the session.<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143797864-ba84010a-e449-4802-9b35-906a98f85831.png"><p>The login will save the role and user's information in the session.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F2 - User will be directed to a landing page upon login<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143797904-165e87a0-39b6-4a9b-87a2-9385c3f7869b.png"><p>The user is directed towards the Home page when they login. This is a protected page.</td></tr></td></tr></table></td></tr><table><tr><td>F3 - User will be able to logout</td></tr><tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/87](https://github.com/BangTheBanger/IT202-009/pull/87)</p></td></tr><tr><td><table><tr><td>F3 - Logging out will redirect to login page<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143797988-61f6025b-c075-4bdb-804b-6bc238358488.png"><p>The user will be redirected to login page post logout.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F3 - User should see a message that they’ve successfully logged out<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143797988-61f6025b-c075-4bdb-804b-6bc238358488.png"><p>The user sees a message when they logout.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F3 - Session should be destroyed (so the back button doesn’t allow them access back in)<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143798110-aee33287-6e75-4599-8f31-6cb367bb8b36.png"><p>Page after trying to use the back button after logging out. The website will redirect the user to login if they aren't logged in, in the case they try to access protected pages.</td></tr></td></tr></table></td></tr><table><tr><td>F4 - Basic security rules implemented</td></tr><tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/87](https://github.com/BangTheBanger/IT202-009/pull/87)</p></td></tr><tr><td><table><tr><td>F4 - Authentication<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143798213-ff8741e5-7648-4248-817a-669bb493df6a.png"><p>The function that checks if the session is logged into an user. If not they'll redirect to login. And is called only on 'protected' pages, or pages only a logged in user should be able to access.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F4 - Roles/Authorization<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143798298-53c0dcb9-448e-4d22-8465-557f03342e0a.png"><p>The Roles table is created.</td></tr></td></tr></table></td></tr><table><tr><td>F5 - Basic Roles implemented</td></tr><tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/projects/1](https://github.com/BangTheBanger/IT202-009/projects/1)</p></td></tr><tr><td><table><tr><td>F5 - Have a Roles table (id, name, description, is_active, modified, created)<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143798298-53c0dcb9-448e-4d22-8465-557f03342e0a.png"><p>Roles table created with all the requirements.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F5 - Have a User Roles table (id, user_id, role_id, is_active, created, modified)<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143798414-93765b4e-4514-4596-9fa7-8919e07af6a1.png"><p>The User table is created with all the necessary requirements.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F5 - Include a function to check if a user has a specific role (we won’t use it for this milestone but it should be usable in the future)<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143798504-0cea5fb7-9132-45b0-9abd-8f8e83decc39.png"><p>Function to check for roles.</td></tr></td></tr></table></td></tr><table><tr><td>F6 - Site should have basic styles/theme applied; everything should be styled</td></tr><tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/87](https://github.com/BangTheBanger/IT202-009/pull/87)</p></td></tr><tr><td><table><tr><td>F6 - I.e., forms/input, navigation bar, etc<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143798561-3b57f6dd-1a85-44f5-bf1d-3f638397bd3f.png"><p>The page is styled.</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143798635-918a15ca-3142-4ca9-8e12-b5aba910ff04.png"><p>The code for styles.css.</td></tr></td></tr></table></td></tr><table><tr><td>F7 - Any output messages/errors should be “user friendly”</td></tr><tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/87](https://github.com/BangTheBanger/IT202-009/pull/87)</p></td></tr><tr><td><table><tr><td>F7 - Any technical errors or debug output displayed will result in a loss of points<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143800287-82ce7a02-d6d1-449f-a8df-a3fd38a619cb.png"><p>Because it's hard to create an error with such a simple page, I can't exemplify the error output. But it would look similar to this error message.</td></tr></td></tr></table></td></tr><table><tr><td>F8 - User will be able to see their profile</td></tr><tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/87](https://github.com/BangTheBanger/IT202-009/pull/87)</p></td></tr><tr><td><table><tr><td>F8 - Email, username, etc<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143798974-54d69d14-6190-48ee-a44c-4a0ded0343e2.png"><p>The user is able to see all his information, the password that is filled is because my browser has the log-in information saved. In normal circumstances it would be blank.</td></tr></td></tr></table></td></tr><table><tr><td>F9 - User will be able to edit their profile</td></tr><tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/87](https://github.com/BangTheBanger/IT202-009/pull/87)</p></td></tr><tr><td><table><tr><td>F9 - Changing username/email should properly check to see if it’s available before allowing the change<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143799137-dda1f055-cb16-4cc4-86d1-966d38682b6a.png"><p>In this case the user tried to change their emails to an existing account's email.</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143799186-631dd8f5-2ab4-47bc-a737-868fc1ca6d42.png"><p>And in this case the user tried to change their username to "admin" which is already an user.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F9 - Any other fields should be properly validated<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143799378-3d6c8756-1381-4673-9202-39f40f016b7c.png"><p>When the user tries to change the account's information without typing the current password, nothing will change and the user gets an error message.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F9 - Allow password reset (only if the existing correct password is provided)<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143799435-968dafb4-6177-4b2e-afe2-234fb4686b14.png"><p>In this case the password was reset because the user input their current password.</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143799378-3d6c8756-1381-4673-9202-39f40f016b7c.png"><p>In this case the user didn't type their current password, and got the error message.</td></tr></td></tr></table></td></tr></td></tr></table>

<table><tr><td>Milestone 2</td></tr><tr><td><table><tr><td>F1 - Pick a simple game to implement, anything that generates a score that’s more advanced than a simple random number generator (may build off of a sample from the site shared in class)</td></tr><tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/102](https://github.com/BangTheBanger/IT202-009/pull/102)</p></td></tr><tr><td><table><tr><td>F1 - What game will you be doing?<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143819131-80b4420f-a320-461d-b8c3-8a99e050af50.png"><p>I chose to do Breakout.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F1 - Briefly describe it.<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143819131-80b4420f-a320-461d-b8c3-8a99e050af50.png"><p>The game consists of a ball, a paddle, and bricks. The player controls the paddle, and hits the ball trying to avoid it from falling down while trying to break all the bricks. As the game progresses, every time the player breaks all the bricks, the ball starts moving faster.
The game is considered complete, although maybe needing some debugging that I would love NOT to do.</td></tr></td></tr></table></td></tr><table><tr><td>F2 - The system will save the user’s score at the end of the game if the user is logged in</td></tr><tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/game.php](https://fa367-prod.herokuapp.com/Project/game.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/102](https://github.com/BangTheBanger/IT202-009/pull/102)</p></td></tr><tr><td><table><tr><td>F2 - There should be a scores table (id, user_id, score, created)<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/146699496-d9eeab46-21ec-4ba3-be1b-b6df64aa0b02.png"><p>The table for scores has been created.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F2 - Each received score is a new entry (scores will not be updated)<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/146699496-d9eeab46-21ec-4ba3-be1b-b6df64aa0b02.png"><p>Every time the player loses the game, the score is submitted to the scores table.</td></tr></td></tr></table></td></tr><table><tr><td>F3 - The user will be able to see their last 10 scores</td></tr><tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/user_scores.php](https://fa367-prod.herokuapp.com/Project/user_scores.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/105](https://github.com/BangTheBanger/IT202-009/pull/105)</p></td></tr><tr><td><table><tr><td>F3 - Show on their profile page<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143853628-42cd384b-60a9-4aa2-8d5d-65f311ffb7c5.png"><p>It shows the top 10 scores. In this case, it shows 8 as the user only had 8 scores.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F3 - Ordered by most recent<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143853628-42cd384b-60a9-4aa2-8d5d-65f311ffb7c5.png"><p>As seen in the image the scores are sorted by date, most recent first.</td></tr></td></tr></table></td></tr><table><tr><td>F4 - Create functions that output the following scoreboards (this will be used later)</td></tr><tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/user_scores.php](https://fa367-prod.herokuapp.com/Project/user_scores.php)</p></td></tr><tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/105](https://github.com/BangTheBanger/IT202-009/pull/105)</p></td></tr><tr><td><table><tr><td>F4 - Top 10 Weekly<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143856277-0eada20f-bec3-4389-bd4b-ce2e386711af.png"><p>The function for the weekly scores.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F4 - Top 10 Monthly<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143856374-1b20dae0-5a65-4065-8774-eb9abc5a2174.png"><p>The function for the monthly scores.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F4 - Top 10 Lifetime<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143856443-2496b0e0-ac43-4fc5-8c67-27bdd8e6d826.png"><p>The function for all the scores.</td></tr></td></tr></table></td></tr><tr><td><table><tr><td>F4 - Scoreboards should show no more than 10 results; if there are no results a proper message should be displayed (i.e., “No [time period] scores to display”)<tr><td>Status: completed</td></tr><tr><td><img width="100%" src="https://user-images.githubusercontent.com/29554235/143856277-0eada20f-bec3-4389-bd4b-ce2e386711af.png"><p>As shown on the previous images, all of them display a message for when there are no scores to display.</td></tr></td></tr></table></td></tr></td></tr></table>


<table>
<tr><td>Milestone 3</td></tr><tr><td>
<table>
<tr><td>F1 - Users will have points associated with their account. (2021-12-11)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/109](https://github.com/BangTheBanger/IT202-009/pull/109)</p></td></tr>
<tr><td>
<table>
<tr><td>F1 - Alter the User table to include points with a default of 0.</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145733312-84ece6d9-464c-4e2f-96e1-c7ee803e66e5.png">
<p>Users Table with points column.
( I see you professor, I hope you had fun playing breakout :D )</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F1 - Points should show on their profile page</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145735107-343d71f2-3e3b-4ea9-840d-fbcdfbf0029f.png">
<p>Points being displayed in profile page.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F2 - Create a PointsHistory table (id, user_id, point_change, reason, created) (2021-12-11)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/109](https://github.com/BangTheBanger/IT202-009/pull/109)</p></td></tr>
<tr><td>
<table>
<tr><td>F2 - Any new entry should update the user’s points value (do not update the User points column directly)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145735639-a8d07839-99ae-4318-b907-c53518950b81.png">
<p>The code that executes when a logged user plays the game.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F3 - Competitions table should have the following columns (id, name, created, duration, expires (now + duration), current_reward, starting_reward, join_fee, current_participants, min_participants, paid_out (boolean), min_score, first_place_per, second_place_per, third_place_per, cost_to_create, created, modified) (2021-12-12)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/109](https://github.com/BangTheBanger/IT202-009/pull/109)</p></td></tr>
<tr><td>
<table>
<tr><td>F3 - ~No Sub Feature~</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145735745-dc864e61-b91a-4bef-846d-b5a4483bb2fe.png">
<p>Competitions table.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F4 - User will be able to create a competition (2021-12-12)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/109](https://github.com/BangTheBanger/IT202-009/pull/109)</p></td></tr>
<tr><td>
<table>
<tr><td>F4 - Competitions will start at 1 point (reward)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145735945-54b315bd-c18d-435d-9efd-0cf74e27762b.png">
<p>Query to create the table, Default for starting_reward and current_reward is 1. </p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F4 - User sets a name for the competition</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145736058-8441ece0-2b8b-43b4-935a-9af8a1ce60ca.png">
<p>User form to create competition.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F4 - User determines % given for 1st, 2nd, and 3rd place winners</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145736058-8441ece0-2b8b-43b4-935a-9af8a1ce60ca.png">
<p>User form to create competition.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F4 - User determines if it’s free to join or the cost to join (min 0 for free)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145736058-8441ece0-2b8b-43b4-935a-9af8a1ce60ca.png">
<p>User form to create competition.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F4 - User determines the duration of the competition (in days)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145736058-8441ece0-2b8b-43b4-935a-9af8a1ce60ca.png">
<p>User form to create competition.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F4 - User can determine the minimum score to qualify (min 0)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145736058-8441ece0-2b8b-43b4-935a-9af8a1ce60ca.png">
<p>User form to create competition.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F4 - User determines minimum participants for payout (min 3)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145736058-8441ece0-2b8b-43b4-935a-9af8a1ce60ca.png">
<p>User form to create competition.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F4 - Show any user friendly error messages</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145736140-1f421d94-bdda-41d4-a9aa-adb7e8539c26.png">
<p>User form to create competition.</p>
</td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145736173-fee8306c-886a-4a63-aed8-40a4683cf34e.png">
<p>Code will throw flash message to tell user if something went wrong.</p>
</td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145736189-10c601b6-e347-4eb9-83b6-be4ff6f596e6.png">
<p>Code will throw flash message to tell user if something went wrong.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F4 - Show user friendly confirmation message that competition was created</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145736213-cc504ad6-836c-4066-9c7d-d15a29034cdf.png">
<p>Message when user creates a competition.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F4 - The cost to the creator of the competition will be (1 + starting reward value)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145736269-48ce4901-19e4-4889-8c37-da2698fc0f56.png">
<p>The code that runs when creating a competition, highlighted lines are relevant to the feature.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F5 - Each new participant causes the Reward value to increase by at least 1 or 50% of the joining fee rounded up (2021-12-12)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/109](https://github.com/BangTheBanger/IT202-009/pull/109)</p></td></tr>
<tr><td>
<table>
<tr><td>F5 - ~No Sub Feature~</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145736403-e8837fde-6ddc-483a-ba4d-7b5dedf39ba8.png">
<p>Code for reward update</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F6 - Have a page where the User can see active competitions (not expired) (2021-12-12)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/109](https://github.com/BangTheBanger/IT202-009/pull/109)</p></td></tr>
<tr><td>
<table>
<tr><td>F6 - For this milestone limit the output to a maximum of 10</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145738103-b6a4a04b-cad5-44fb-88c3-303cff5c7c9e.png">
<p></p>
</td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145738125-6c1e2e42-cbdf-4ae3-9674-c9d42b1dea27.png">
<p>The code for displaying the existing competitions.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F6 - Order the results by soonest to expire</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145738103-b6a4a04b-cad5-44fb-88c3-303cff5c7c9e.png">
<p></p>
</td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145738125-6c1e2e42-cbdf-4ae3-9674-c9d42b1dea27.png">
<p>The code for displaying the existing competitions.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F7 - Will need an association table CompetitionParticipants (id, comp_id, user_id, created) (2021-12-12)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/109](https://github.com/BangTheBanger/IT202-009/pull/109)</p></td></tr>
<tr><td>
<table>
<tr><td>F7 - Comp_id and user_id should be a composite unique key (user can only join a competition once)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145738364-63dfff07-5671-4e65-b01e-eaab617b8b47.png">
<p>The line "UNIQUE KEY `unique_id`(`comp_id`, `user_id`)" defines an invisible unique key that limits the entries to be unique.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F8 - User can join active competitions ()</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/109](https://github.com/BangTheBanger/IT202-009/pull/109)</p></td></tr>
<tr><td>
<table>
<tr><td>F8 - Creates an entry in CompetitionParticipants</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145738660-9f990289-1929-4548-95b6-0ec387377c14.png">
<p>Code for the competitionparticipants INSERT query.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F8 - Recalculate the Competitions.participants value based on the count of participants for this competition from the CompetitionParticipants table.</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145738767-2fe7f7d0-7a4b-4b3a-9ca1-64c9dabd0d0a.png">
<p>Code for the competitions UPDATE query.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F8 - Update the Competitions.reward based on the # of participants and the appropriate math from the competition requirements above</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145738817-32c89b7d-1f44-4e8c-8daf-88b952d7c2e1.png">
<p>Code for the competitions UPDATE query.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F8 - Show proper error message if user is already registered</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145738865-ddd738ab-7c92-4b61-80bd-4c72071c6d92.png">
<p>Last flash is a message that runs after a check if the user is joined or not.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F8 - Show proper confirmation if user registered successfully</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145738865-ddd738ab-7c92-4b61-80bd-4c72071c6d92.png">
<p>Second to last flash is a message that runs after the user is successfully joined.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F9 - Create function that calculates competition winners (2021-12-12)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/login.php](https://fa367-prod.herokuapp.com/Project/login.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/109](https://github.com/BangTheBanger/IT202-009/pull/109)</p></td></tr>
<tr><td>
<table>
<tr><td>F9 - Get all expired and not paid_out competitions</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145739081-c1f34ae5-fe0e-4f9c-8d2e-699cacf94bc5.png">
<p>Code for the function that will fetch the competitions.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<tr><td>
<table>
<tr><td>F9 - For each competition</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145739132-5c39169d-4ce8-461a-b05c-12d62d233200.png">
<p></p>
</td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145739163-82ba7217-0b91-480d-b111-5ea68f7aad74.png">
<p></p>
</td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/145739180-33cc7ad9-a2d7-4e8f-894d-8ebe2bad0a95.png">
<p>Code for the function.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr></td></tr></table>


<table>
<tr><td>Milestone 4</td></tr><tr><td>
<table>
<tr><td>F1 - User can set their profile to be public or private (will need another column in Users table) (2021-12-20)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/profile.php?id=36](https://fa367-prod.herokuapp.com/Project/profile.php?id=36)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/110](https://github.com/BangTheBanger/IT202-009/pull/110)</p></td></tr>
<tr><td>
<table>
<tr><td>F1 - If public, hide email address from other users</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/146759908-e408fc63-5542-4328-8315-a50ec4ecb7a1.png">
<p>When profile is accessed and not public.</p>
</td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/146760371-a9e98e22-4685-4497-b258-866efbaaaa65.png">
<p>Button for changing profile status</p>
</td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/146760494-d3bf6537-913a-4004-8024-b7a6ddb281e9.png">
<p>How public profile looks for other users.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F2 - User will be able to see their competition history (2021-12-20)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/profile.php](https://fa367-prod.herokuapp.com/Project/profile.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/110](https://github.com/BangTheBanger/IT202-009/pull/110)</p></td></tr>
<tr><td>
<table>
<tr><td>F2 - Limit to 10 results; Paginate anything after 10; If no results, show the appropriate message</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/146760609-14db6431-001f-472f-9c80-ebed32651973.png">
<p>Profile and the competition list.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F3 - User with the role of “admin” can edit a competition where paid_out = false (2021-12-20)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-dev.herokuapp.com/Project/admin/edit_comps.php](https://fa367-dev.herokuapp.com/Project/admin/edit_comps.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/110](https://github.com/BangTheBanger/IT202-009/pull/110)</p></td></tr>
<tr><td>
<table>
<tr><td>F3 - They can adjust any of the regular form values; If the competition was expired they can update the duration to include extra time</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/146760993-30614539-1163-46c8-b5d3-1b935922a401.png">
<p>Edit Comp page</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F4 - Add pagination to the Active Competitions view (2021-12-20)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/comp.php](https://fa367-prod.herokuapp.com/Project/comp.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/110](https://github.com/BangTheBanger/IT202-009/pull/110)</p></td></tr>
<tr><td>
<table>
<tr><td>F4 - Show 10 competitions per page; Paginate anything after 10; If no results, show the appropriate message</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/146763402-db8339db-cc02-49a9-af17-b9b00f13a359.png">
<p>Active Competitions table.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F5 - Anywhere a username is displayed should be a link to that user’s profile (2021-12-20)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/home.php](https://fa367-prod.herokuapp.com/Project/home.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/110](https://github.com/BangTheBanger/IT202-009/pull/110)</p></td></tr>
<tr><td>
<table>
<tr><td>F5 - This includes all scoreboards; If the profile is private you can have the page just display “this profile is private” upon access</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/146763636-69233de6-4b9f-4e3e-9583-e44368f10fe6.png">
<p>Competition description leaderboard table.</p>
</td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/146763991-c3b2b317-1bd4-4fb2-94ba-f2039782420e.png">
<p>Home page with leaderboards.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F6 - Viewing an active or expired competition should show the top 10 scoreboard related to that competition (2021-12-20)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/compprofile.php?compid=1](https://fa367-prod.herokuapp.com/Project/compprofile.php?compid=1)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/110](https://github.com/BangTheBanger/IT202-009/pull/110)</p></td></tr>
<tr><td>
<table>
<tr><td>F6 - No Subfeatures</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/146763636-69233de6-4b9f-4e3e-9583-e44368f10fe6.png">
<p>Competition description leaderboard table.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F7 - Game should be fully implemented/complete by this point (2021-12-20)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/game.php](https://fa367-prod.herokuapp.com/Project/game.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/110](https://github.com/BangTheBanger/IT202-009/pull/110)</p></td></tr>
<tr><td>
<table>
<tr><td>F7 - Game should tell the player if they’re not logged in that their score will not be recorded.</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/146764562-b43eae47-8e99-415c-97cf-e08304d571ae.png">
<p>Game with a non-logged-on user.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F8 - User’s score history will include pagination (2021-12-20)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/profile.php](https://fa367-prod.herokuapp.com/Project/profile.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/110](https://github.com/BangTheBanger/IT202-009/pull/110)</p></td></tr>
<tr><td>
<table>
<tr><td>F8 - Show latest 10; Paginate after 10; Show appropriate message for no results</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/146764686-bbfa7e67-90f0-4653-a450-80f5e7212370.png">
<p>Profile page.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr>
<table>
<tr><td>F9 - Home page will have a weekly, monthly, and lifetime scoreboard (2021-12-20)</td></tr>
<tr><td>Status: complete</td></tr>
<tr><td>Links:<p>

 [https://fa367-prod.herokuapp.com/Project/home.php](https://fa367-prod.herokuapp.com/Project/home.php)</p></td></tr>
<tr><td>PRs:<p>

 [https://github.com/BangTheBanger/IT202-009/pull/110](https://github.com/BangTheBanger/IT202-009/pull/110)</p></td></tr>
<tr><td>
<table>
<tr><td>F9 - Will also have a link to the game; Scoreboards will show username and points for the session (See requirement about username linking to profile)</td></tr>
<tr><td>Status: 
<img width="100" height="20" src="https://via.placeholder.com/400x120/009955/fff?text=completed"></td></tr>

<tr><td>
<img width="768px" src="https://user-images.githubusercontent.com/29554235/146764915-a3925e49-21ca-4de2-8917-e048d7310b2e.png">
<p>Home Page. It shows the three leaderboards and links to the competition link, the game link is on the Nav bar.</p>
</td></tr>

</td>
</tr>
</table>
</td>
</tr></td></tr></table>

### Intructions
#### Don't delete this
1. Pick one project type
2. Create a proposal.md file in the root of your project directory of your GitHub repository
3. Copy the contents of the Google Doc into this readme file
4. Convert the list items to markdown checkboxes (apply any other markdown for organizational purposes)
5. Create a new Project Board on GitHub
   - Choose the Automated Kanban Board Template
   - For each major line item (or sub line item if applicable) create a GitHub issue
   - The title should be the line item text
   - The first comment should be the acceptance criteria (i.e., what you need to accomplish for it to be "complete")
   - Leave these in "to do" status until you start working on them
   - Assign each issue to your Project Board (the right-side panel)
   - Assign each issue to yourself (the right-side panel)
6. As you work
  1. As you work on features, create separate branches for the code in the style of Feature-ShortDescription (using the Milestone branch as the source)
  2. Add, commit, push the related file changes to this branch
  3. Add evidence to the PR (Feat to Milestone) conversation view comments showing the feature being implemented
     - Screenshot(s) of the site view (make sure they clearly show the feature)
     - Screenshot of the database data if applicable
     - Describe each screenshot to specify exactly what's being shown
     - A code snippet screenshot or reference via GitHub markdown may be used as an alternative for evidence that can't be captured on the screen
  4. Update the checklist of the proposal.md file for each feature this is completing (ideally should be 1 branch/pull request per feature, but some cases may have multiple)
    - Basically add an x to the checkbox markdown along with a date after
      - (i.e.,   - [x] (mm/dd/yy) ....) See Template above
    - Add the pull request link as a new indented line for each line item being completed
    - Attach any related issue items on the right-side panel
  5. Merge the Feature Branch into your Milestone branch (this should close the pull request and the attached issues)
    - Merge the Milestone branch into dev, then dev into prod as needed
    - Last two steps are mostly for getting it to prod for delivery of the assignment 
  7. If the attached issues don't close wait until the next step
  8. Merge the updated dev branch into your production branch via a pull request
  9. Close any related issues that didn't auto close
    - You can edit the dropdown on the issue or drag/drop it to the proper column on the project board
