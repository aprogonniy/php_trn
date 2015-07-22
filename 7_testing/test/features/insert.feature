Feature: Insertion
  In order to extend knowledge base
  As a user
  I want to be able to create new database entries

  Scenario:
    Given I have an article
    When I have entered insert command
    Then The article should be added to database