pragma solidity ^0.5.16;

contract Election{

    struct Candidate {
        uint id;
        string name;
        uint votecount;
    }

    mapping(address => bool) public voters;

    mapping(uint => Candidate) public candidates;
    
    uint public candidatesCount;
    
    //voted event
    event votedEvent (
            uint indexed _candidateId
   );
    
     constructor () public{
         addCandidate("BJP");
         addCandidate("Congress");
         addCandidate("Aam Aadmi Party");

    }
    
    function addCandidate (string  memory _name) private {
        candidatesCount ++;
        candidates[candidatesCount] = Candidate(candidatesCount, _name, 0);
        
    }
   function vote (uint _candidateId) public {
        //require that they haven't voted before
      require(!voters[msg.sender]);
        //requie a valid candidate
         require( _candidateId > 0 && _candidateId <= candidatesCount);

        //record that voter has voted
             voters[msg.sender] = true;
        candidates[_candidateId].votecount ++;

        //trigger voted event
       emit votedEvent(_candidateId);
    }
}