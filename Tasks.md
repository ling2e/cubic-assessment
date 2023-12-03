## Task 1: **Random Number Collection and Storage**

### Objective:
> Develop a frontend interface that continuously displays a running random number.
> Implement a data collection feature that, when activated, captures the last digit of this number at 1-second intervals.
> The collection process should terminate after 5 seconds, marking the end of a transaction. The accumulated digits from the 5 intervals should be stored in the database as a single transaction.

#### Steps:
1. Display a continuously running random number (5 digit) on the frontend interface.
1. Integrate a button for data collection. Once pressed:
    - Capture the last digit of the running number every second.
1. After 5 seconds, consider the data collection phase complete and cease data capture.
    - Store the sequence of 5 digits obtained from the data collection phase into the database as one transaction.
----
#### Technical Specifications:

Use the following technologies:
- PHP
- JavaScript
- HTML
- CSS
- MySQL

Ensure all developed code is committed to GitHub.
Provide Database Schema that you done.
Presentation:
- Demonstrate the developed solution.