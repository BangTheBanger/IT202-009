# Project Name: Simple Arcade
## Project Summary: This project will create a simple Arcade with scoreboards and competitions based on the implemented game.
## Github Link: https://github.com/BangTheBanger/IT202-009/tree/prod
## Project Board Link: https://github.com/BangTheBanger/IT202-009/projects/1
## Website Link: https://fa367-prod.herokuapp.com
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

- Milestone 2
    - Pick a simple game to implement, anything that generates a score that’s more advanced than a simple random number generator (may build off of a sample from the site shared in class)
        - What game will you be doing?
            - [game]
        - Briefly describe it.
            - [describe]
        - Note: For this milestone the game doesn’t need to be complete, just have something basic or a placeholder that can generate a score when played.
    - The system will save the user’s score at the end of the game if the user is logged in
        - There should be a scores table (id, user_id, score, created)
        - Each received score is a new entry (scores will not be updated)
    - The user will be able to see their last 10 scores
        - Show on their profile page
        - Ordered by most recent
    - Create functions that output the following scoreboards (this will be used later)
        - Top 10 Weekly
        - Top 10 Monthly
        - Top 10 Lifetime
        - Scoreboards should show no more than 10 results; if there are no results a proper message should be displayed (i.e., “No [time period] scores to display”)

- Milestone 3
    - Users will have points associated with their account.
        - Alter the User table to include points with a default of 0.
            - This field will not be incremented/decremented directly, you must use the PointsHistory table to calculate it and set it each time the points change
        - Points should show on their profile page
            - You may show points elsewhere as well if you wish
    - Create a PointsHistory table (id, user_id, point_change, reason, created)
        - Any new entry should update the user’s points value (do not update the User points column directly)
            - SUM the point_change for the user_id to get the total
    - Competitions table should have the following columns (id, name, created, duration, expires (now + duration), current_reward, starting_reward, join_fee, current_participants, min_participants, paid_out (boolean), min_score, first_place_per, second_place_per, third_place_per, cost_to_create, created, modified)
    - User will be able to create a competition
        - Competitions will start at 1 point (reward)
        - User sets a name for the competition
        - User determines % given for 1st, 2nd, and 3rd place winners
            - Combination must be equal to 100% (no more, no less)
        - User determines if it’s free to join or the cost to join (min 0 for free)
        - User determines the duration of the competition (in days)
        - User can determine the minimum score to qualify (min 0)
        - User determines minimum participants for payout (min 3)
        - Show any user friendly error messages
        - Show user friendly confirmation message that competition was created
        - The cost to the creator of the competition will be (1 + starting reward value)
            - If they can’t afford it, the competition should not be created
            - If they can afford it, automatically add them to the competition
    - Each new participant causes the Reward value to increase by at least 1 or 50% of the joining fee rounded up
    - Have a page where the User can see active competitions (not expired)
        - For this milestone limit the output to a maximum of 10
        - Order the results by soonest to expire
    - Will need an association table CompetitionParticipants (id, comp_id, user_id, created)
        - Comp_id and user_id should be a composite unique key (user can only join a competition once)
    - User can join active competitions 
        - Creates an entry in CompetitionParticipants
        - Recalculate the Competitions.participants value based on the count of participants for this competition from the CompetitionParticipants table.
        - Update the Competitions.reward based on the # of participants and the appropriate math from the competition requirements above
            - Best to due this based on a simple equation via the initial Competition data and participants
        - Show proper error message if user is already registered
        - Show proper confirmation if user registered successfully
    - Create function that calculates competition winners
        - Get all expired and not paid_out competitions
        - For each competition
            - Check that the participant count against the minimum required
            - Get the top 3 winners
                - Pick 1 (strike out the option you won’t do; do not delete):
                    - Option 1: Scores are calculated by the sum of the score from the Scores table where it was earned/created between Competition start and Competition expires timestamps
                    - Option 2: Where the score was earned/created between when the user joined the competition and when the Competition expires
            - Calculate the payout (reward * place_percent)
                - Round up the value (it’s ok to pay out an extra point here and there)
            - Create entries for the Users in the PointsHistory table
                - Apply the new values (SUM) to their points column in the Users table after entry is added
                - Reason should be recorded as ‘competition’ (or something with more precise information)
            - Mark the competition as paid_out = true

- Milestone 4
    - User can set their profile to be public or private (will need another column in Users table)
        - If public, hide email address from other users
    - User will be able to see their competition history
        - Limit to 10 results
        - Paginate anything after 10
        - If no results, show the appropriate message
    - User with the role of “admin” can edit a competition where paid_out = false
        - They can adjust any of the regular form values
        - If the competition was expired they can update the duration to include extra time
    - Add pagination to the Active Competitions view
        - Show 10 competitions per page
        - Paginate anything after 10
        - If no results, show the appropriate message
    - Anywhere a username is displayed should be a link to that user’s profile
        -   This includes all scoreboards
        - If the profile is private you can have the page just display “this profile is private” upon access
    - Viewing an active or expired competition should show the top 10 scoreboard related to that competition
    - Game should be fully implemented/complete by this point
        - Game should tell the player if they’re not logged in that their score will not be recorded.
    - User’s score history will include pagination
        - Show latest 10
        -  Paginate after 10
        - Show appropriate message for no results
    - Home page will have a weekly, monthly, and lifetime scoreboard
        - Will also have a link to the game
        - Scoreboards will show username and points for the session
            - (See requirement about username linking to profile)

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
