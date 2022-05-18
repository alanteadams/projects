from nose.tools import *
from gothonweb.planisphere import *



def test_room():
    gold = Room("GoldRoom",
                """This room has gold ixn it you can grab. There's a
                door to north.""")
    assert_equal(gold.name, "GoldRoom")
    assert_equal(gold.paths, {})

def test_room_paths():
    center = Room("Center", "Test room in the center.")
    north = Room("North", "Test room in the north.")
    south = Room("South", "Test room in the south.")

    center.add_paths({'north': north, 'south': south})
    assert_equal(center.go('north'), north)
    assert_equal(center.go('south'), south)

def test_map():
    start = Room("Start", "You can go west and down a hole.")
    west = Room("Trees", "There are trees here, you can go east.")
    down = Room("Dungeon", "It's dark down here, you can go up.")

    start.add_paths({'west': west, 'down': down})
    west.add_paths({'east': start})
    down.add_paths({'up': start})

    assert_equal(start.go('west'), west)
    assert_equal(start.go('west').go('east'), start)
    assert_equal(start.go('down').go('up'), start)


def test_gothon_game_map():
    start_room = load_room(START)
    assert_equal(start_room.go('shoot!'), generic_death)
    assert_equal(start_room.go('dodge!'), generic_death)

    room = start_room.go('tell a joke')
    assert_equal(room, laser_weapon_armory)

    laser_room = load_room('laser_weapon_armory')
    assert_equal(laser_room.go('*'), generic_death)

    assert_equal(laser_room.go('0132'), the_bridge)

    bridge_room = load_room('the_bridge')
    assert_equal(bridge_room.go('throw the bomb'), generic_death)
    assert_equal(bridge_room.go('slowly place the bomb'), escape_pod)

    escape_room = load_room('escape_pod')
    assert_equal(escape_room.go('*'), the_end_loser)
    assert_equal(escape_room.go('2'), the_end_winner)
