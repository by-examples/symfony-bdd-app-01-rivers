Feature: I would like to edit rivers

  Scenario Outline: Insert records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/river/"
    Then I should not see "<river>"
     And I follow "Create a new entry"
    Then I should see "River creation"
    When I fill in "Name" with "<river>"
     And I fill in "Length" with "<length>"
     And I press "Create"
    Then I should see "<river>"
     And I should see "<length>"

  Examples:
    | river          | length |
    | ABC RIV        | 7182   |
    | Vistula RIV    | 1234   |
    | The Thames RIV | 555    |


  Scenario Outline: Edit records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/river/"
    Then I should not see "<new-river>"
    When I follow "<old-river>"
    Then I should see "<old-river>"
    When I follow "Edit"
     And I fill in "Name" with "<new-river>"
     And I fill in "Length" with "<new-length>"
     And I press "Update"
     And I follow "Back to the list"
    Then I should see "<new-river>"
     And I should see "<new-length>"
     And I should not see "<old-river>"

  Examples:
    | old-river     | new-river       | new-length |
    | Vistula RIV   | VI-stula RIV    | 9876       |
    | ABC RIV       | The NEW RIV     | 3333       |


  Scenario Outline: Delete records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/river/"
    Then I should see "<river>"
    When I follow "<river>"
    Then I should see "<river>"
    When I press "Delete"
    Then I should not see "<river>"

  Examples:
    |  river         |
    | VI-stula RIV   |
    | The NEW RIV    |
    | The Thames RIV |

