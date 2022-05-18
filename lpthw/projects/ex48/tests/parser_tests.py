from nose.tools import *
from ex48 import parser


def test_peek():
    assert_equal(parser.peek([('verb', 'run'), ('direction', 'north')]), ('verb'))

def test_match():
    assert_equal(parser.match([('verb', 'run'), ('direction', 'north')], 'verb'), ('verb', 'run'))

def test_skip():
    assert_equal(parser.skip([('stop', 'the'), ('noun', 'bear'), ('verb', 'run'), ('direction', 'north')], 'stop'), None)

@raises(Exception)
def test_parse_verb():
    assert_equal(parser.parse_verb([('direction', 'north'), ('verb', 'run')]))

def test_parse_object():
    assert_equal(parser.parse_object([('noun', 'bear'), ('verb', 'run'), ('direction', 'north')]), ('noun', 'bear'))

def test_parse_subject():
    assert_equal(parser.parse_subject([('stop', 'the'), ('verb', 'run'), ('direction', 'north')]), ('noun', 'player'))

#def test_parse_sentence():
#    assert_equal(parser.parse_sentence([('verb', 'run'), ('direction', 'north')]), parser.Sentence(('noun', 'player'), ('verb', 'run'), ('direction', 'north')))
