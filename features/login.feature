Feature: I would like to log in to the system

  Scenario: Log in as admin
    Given I am on homepage
     Then I should not see "Logged in as admin"
     When I follow "Login"
      And I fill in "username" with "admin"
      And I fill in "password" with "loremipsum"
      And I press "Login"
     Then I should see "Logged in as admin"
     Then I should not see "Login"
     When I follow "Logout"
     Then I should not see "Logged in as admin"
     Then I should see "Login"

  Scenario: Unsuccessful login
    Given I am on homepage
     When I follow "Login"
     When I fill in "username" with "wrong username"
      And I fill in "password" with "wrong password"
      And I press "Login"
     Then I should see "Bad credentials"

  Scenario: Profile unavailable
    Given I go to "/profile"
     Then the response status code should be 404

  Scenario: Resetting unavailable
    Given I go to "/resetting"
     Then the response status code should be 404
