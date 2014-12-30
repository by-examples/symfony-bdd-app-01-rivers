Feature: Web pages

  Scenario: Homepage
    Given I am on homepage
    Then the response status code should be 200
    Then I should see "Homepage."
