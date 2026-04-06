Task 1: Understand the Flow
When filling out the form with an email, the user hits the Save button. The form uses POST to send the data to the /formtest route. Laravel then validates the email, stores it in the session, and redirects back to the page to display the updated list of saved emails.

Reflection Questions
1. What is the difference between GET and POST?
GET is used to view or load a page; it does not change any data. POST is used to send data to the server, such as adding or deleting an email.

2. Why do we use @csrf in forms?
@csrf adds a security token to protect the form from CSRF attacks. Laravel checks this token when the form is submitted. Without it, the form will not work.

3. What is session used for in this activity?
Session is used to temporarily store the list of emails. It allows the emails to remain visible even after the page is refreshed.

4. What happens if session is cleared?
All saved emails will be deleted. The list becomes empty and the user has to add the emails again.
