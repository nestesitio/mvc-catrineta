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

namespace Catrineta\lang;

/**
 * Description of LangTools
 *
 * @author Luís Pinto / luis.nestesitio@gmail.com
 * Created @Nov 25, 2017
 */
class LangTools
{

    /**
     * 
     * @param array $choices
     * @param array $options
     * @return string
     */
    public static function choice($choices, $options)
    {
        foreach ($choices as $choice) {
            if(isset($options[$choice])){
                return $options[$choice];
            }
        }
        return $options[0];
    }

}
