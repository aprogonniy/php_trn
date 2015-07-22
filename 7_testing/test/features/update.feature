Feature: Updating
  In order to change added articles
  As a user
  I want to be able to update database entries

  Scenario:
    Given I have an article
    When I have entered update command
    And I have changed some data in article
    Then The article should be updated in database