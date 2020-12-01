<?php

// 游泳类
class Swim
{
    protected $backstroke; // 仰泳
    protected $breaststroke; // 蛙泳
    public function __construct($backstroke, $breaststroke) {}
}

// 唱歌
class Sing
{
    protected $singing; // 唱歌技能
    public function __construct($singing) {}
}

// 驾驶
class Drive
{
    protected $driving; // 驾驶技能
    public function __construct($driving) {}
}

// 引入所有类
class Skill
{
    public function makeModule($moduleName, $options)
    {
        switch ($moduleName) {
            case 'Swim':   return new Swim($options[0], $options[1]);
            case 'Sing':   return new Sing($options[0]);
            case 'Drive':    return new Drive($options[0]);
        }
    }
}

// 控制反转，使用哪个，调用哪个
class Ability
{
    protected $power;

    public function __construct(array $modules)
    {
        $skill = new Skill;

        foreach ($modules as $moduleName => $moduleOptions) {
            $this->power[] = $skill->makeModule($moduleName, $moduleOptions);
        }

    }
}



$man = new Ability([
    'Swim' => ['仰泳', '蛙泳'],
    'Sing' => '唱歌',
    'Drive' => '开车'
]);

print_r($man);








