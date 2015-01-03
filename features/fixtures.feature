Feature: We want one page with all the rivers loaded from YML file

  Scenario: List mountains
    Given I am on homepage
     Then I should see "The Nile"
      And I should see "1234"
     Then I should see "The Thames"
      And I should see "9876"
     Then I should see "Mississipi"
      And I should see "3434"

  Scenario: I want to check the number of records
    When I am on homepage
    Then I should see 3 "table tbody tr" elements
