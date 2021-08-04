import * as S from './styles'

type SectionWrapperProps = {
  children: React.ReactNode
}

const SectionWrapper = ({ children }: SectionWrapperProps) => (
  <S.SectionWrapper>{children}</S.SectionWrapper>
)

export default SectionWrapper
