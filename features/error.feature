Feature: I would like to see customized error pages

    Scenario: The Page was not found!
      Given I am on "some/page/that/does/not/exist"
       Then the response status code should be 404
        And I should see "Hey, this beautiful page is yet to be created!"

    Scenario: Serious problem in the application
      Given I am on "/action/with/exception"
       Then the response status code should be 500
        And I should see "We are very sorry, but there was a serious error in the application!"
