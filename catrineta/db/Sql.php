<?php

/*
 * Copyright (C) 2017 Luis Pinto <luis.nestesitio@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Catrineta\db;

/**
 * Description of Mysql
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Sep 22, 2017
 */
class Sql
{

    /** Comparison type. */
    const EQUAL = "=";

    /** Comparison type. */
    const NOT_EQUAL = "<>";

    /** Comparison type. */
    const ALT_NOT_EQUAL = "!=";

    /** Comparison type. */
    const GREATER_THAN = ">";

    /** Comparison type. */
    const LESS_THAN = "<";

    /** Comparison type. */
    const GREATER_EQUAL = ">=";

    /** Comparison type. */
    const LESS_EQUAL = "<=";

    /** Comparison type. */
    const LIKE = " LIKE ";

    /** Comparison type. */
    const NOT_LIKE = " NOT LIKE ";

    /** Comparison type. */
    const DISTINCT = "DISTINCT";

    /** Comparison type. */
    const IN = " IN ";

    /** Comparison type. */
    const NOT_IN = " NOT IN ";

    /** Comparison type. */
    const BETWEEN = " BETWEEN ";

    /** Comparison type. */
    const ALL = "ALL";

    /** Comparison type. */
    const JOIN = "JOIN";

    /** Binary math operator: AND */
    const BINARY_AND = "&";

    /** Binary math operator: OR */
    const BINARY_OR = "|";

    /** "Order by" qualifier - ascending */
    const ASC = "ASC";

    /** "Order by" qualifier - descending */
    const DESC = "DESC";

    /** "IS NULL" null comparison */
    const ISNULL = " IS NULL ";

    /** "IS NOT NULL" null comparison */
    const ISNOTNULL = " IS NOT NULL ";

    /** "LEFT JOIN" SQL statement */
    const LEFT_JOIN = "LEFT JOIN";

    /** "RIGHT JOIN" SQL statement */
    const RIGHT_JOIN = "RIGHT JOIN";

    /** "INNER JOIN" SQL statement */
    const INNER_JOIN = "INNER JOIN";

    /** logical OR operator */
    const LOGICAL_OR = "OR";

    /** logical AND operator */
    const LOGICAL_AND = "AND";

    /** SQL > SELECT DATE_ADD('2008-01-02', INTERVAL 31 DAY); **/
    const DATE_ADD = "DATE_ADD";

    /** SQL > SELECT NOW(); **/
    const NOW = "NOW()";

    /** SQL > search_modifier: AGAINST ('$search' IN NATURAL LANGUAGE MODE) **/
    const SEARCH_NATURAL = "IN NATURAL LANGUAGE MODE";

    /** SQL > search_modifier: AGAINST ('$search' IN NATURAL LANGUAGE MODE WITH QUERY EXPANSION) **/
    const SEARCH_NATURAL_WITH_QUERY = "IN NATURAL LANGUAGE MODE WITH QUERY EXPANSION";

    /** SQL > search_modifier: AGAINST ('$search' IN BOOLEAN MODE) **/
    const SEARCH_BOOLEAN = "IN BOOLEAN MODE";

    /** SQL > SELECT MAX(...); **/
    const FUNCTION_MAX = "MAX";

    /** 
     * SQL > SELECT MIN(...); **/
    const FUNCTION_MIN = "MIN";
    
    /** SQL > SELECT SUM(...); **/
    const FUNCTION_SUM = "SUM";
    
    /** SQL > SELECT COUNT(...); **/
    const FUNCTION_COUNT = "COUNT";
    
    /** SQL > SELECT AVG(...); **/
    const FUNCTION_AVG = "AVG";

    /** SQL > ORDER BY RAND(); **/
    const FUNCTION_RAND = "RAND()";

}
