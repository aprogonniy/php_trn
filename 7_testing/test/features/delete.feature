Feature: Updating
  In order to remove added articles
  As a user
  I want to be able to delete database entries

  Scenario:
    Given I have an article
    When I have entered delete command
    Then The article should be deleted from database