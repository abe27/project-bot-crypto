import { Button } from '@chakra-ui/react'
import { RepeatIcon } from '@chakra-ui/icons'

const TopRefreshAndBacks = ({ isLoadingRefresh = false, reload }) => {
  return (
    <>
      <a
        as="button"
        href={route('dashboard.index')}
        className="mx-2 my-2 bg-white transition duration-150 ease-in-out focus:outline-none hover:bg-gray-100 rounded text-indigo-700 px-6 py-2 text-sm"
      >
        ย้อนกลับ
      </a>
      <Button
        isLoading={isLoadingRefresh}
        leftIcon={<RepeatIcon />}
        colorScheme="purple"
        variant="solid"
        size="sm"
        onClick={() => reload()}
      >
        โหลดข้อมูลใหม่
      </Button>
    </>
  )
}

export default TopRefreshAndBacks
